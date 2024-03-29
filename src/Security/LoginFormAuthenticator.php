<?php

namespace App\Security;

use CrosierSource\CrosierLibBaseBundle\Business\Config\SyslogBusiness;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Security\UserEntityHandler;
use Doctrine\DBAL\Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Exception\TooManyLoginAttemptsAuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * Class LoginFormAuthenticator.
 *
 * Authenticador padrão para o formulário de login do crosier.
 *
 * @author Carlos Eduardo Pauluk
 */
class LoginFormAuthenticator extends AbstractAuthenticator implements AuthenticationEntryPointInterface
{
    use TargetPathTrait;

    private RouterInterface $router;

    private CsrfTokenManagerInterface $csrfTokenManager;

    private UserPasswordHasherInterface $passwordEncoder;

    private UserEntityHandler $userEntityHandler;

    private Security $security;

    private LoggerInterface $logger;

    private SyslogBusiness $syslog;


    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'login' && $request->isMethod('POST');
    }


    public function authenticate(Request $request): PassportInterface
    {
        $csrfToken = $request->request->get('_csrf_token');
        $username = mb_strtolower(trim($request->request->get('username')));
        $plaintextPassword = trim($request->request->get('password'));

        $this->syslog->info('Iniciando tentativa de login para ' . $username);

        /** @var User $user */
        $user = $this->userEntityHandler->getDoctrine()->getRepository(User::class)->findOneBy(['username' => $username]);
        if ($user && !$user->isActive) {
            $this->syslog->info('Erro: usuário inativo');
            throw new CustomUserMessageAuthenticationException('Usuário inativo');
        }

        $request->getSession()->set(Security::LAST_USERNAME, $username);

        $token = new CsrfToken('authenticate', $csrfToken);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            $this->syslog->info('Erro: CSRF inválido');
            throw new InvalidCsrfTokenException();
        }

        return new Passport(
            new UserBadge($username),
            new PasswordCredentials($plaintextPassword),
            [new RememberMeBadge()]
        );
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $errMsg = null;
        if ($exception instanceof TooManyLoginAttemptsAuthenticationException) {
            $errMsg = [
                'messageKey' => 'Login bloqueado (Causa: muitas tentativas de login)'
            ];
        } elseif ($exception instanceof BadCredentialsException) {
            $errMsg = [
                'messageKey' => 'Usuário ou senha inválidos'
            ];
        } else {
            $errMsg = [
                'messageKey' => 'Erro ao efetuar login'
            ];
        }
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $errMsg);

        $this->syslog->err('onAuthenticationFailure: ' . json_encode($errMsg));

        return new RedirectResponse($this->router->generate('login'));
    }


    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        try {
            $this->syslog->info('Login efetuado com sucesso');
            /** @var User $user */
            $user = $token->getUser();
            $this->userEntityHandler->save($user);
            $this->userEntityHandler->renewTokenApi($user);
            $this->userEntityHandler->fixRoles($user);

            $cacheEntmenulocator = new FilesystemAdapter('entmenulocator', 0, $_SERVER['CROSIER_SESSIONS_FOLDER']);
            $cacheEntmenulocator->clear();

            $cacheCrosierCoreAssetExtension = new FilesystemAdapter('CrosierCoreAssetExtension', 0, $_SERVER['CROSIER_SESSIONS_FOLDER']);
            // limpa os cachês definidos em CrosierSource\CrosierLibBaseBundle\Twig\CrosierCoreAssetExtension
            $cacheCrosierCoreAssetExtension->clear();

            $uriToRedirectAfterLogin = $request->getSession()->get('uri_to_redirect_after_login');

            $this->syslog->info('Redirecionando para ' . $uriToRedirectAfterLogin);

            if (strpos($request->getPathInfo(), '/api') !== 0) {
                $request->getSession()->set('uri_to_redirect_after_login', null);
                $landingUrl = $this->getLandingUrl($user, $uriToRedirectAfterLogin);
                return new RedirectResponse($landingUrl);
            }
        } catch (\Throwable $e) {
            $this->logger->error('Erro em onAuthenticationSuccess');
            $this->logger->error($e->getMessage());
        }
        return null;
    }


    private function getLandingUrl(User $user, ?string $uriToRedirectAfterLogin = null): string
    {
        $rootUrlCrosierCore = $this->getRootUrl('crosier-core');
        $landingUrl = "";
        try {
            if ($uriToRedirectAfterLogin && $uriToRedirectAfterLogin !== $rootUrlCrosierCore) {
                return $uriToRedirectAfterLogin;
            }
            $landingUrl = $this->getPriorityLandingUrl($user) ?: $rootUrlCrosierCore;
        } catch (Exception $e) {
            $this->logger->error('Erro em getLandingUrl');
            $this->logger->error($e->getMessage());
        }
        return $landingUrl;
    }

    private function getRootUrl(string $app): string
    {
        $conn = $this->userEntityHandler->getDoctrine()->getConnection();

        $rsRootUrlCrosierCore = $conn->fetchAssociative(
            'SELECT valor FROM cfg_app_config WHERE chave = :chave AND app_uuid IN (SELECT uuid FROM cfg_app WHERE nome = :appNome)',
            [
                'chave' => 'URL_' . $_SERVER['CROSIER_ENV'],
                'appNome' => $app,
            ]
        );
        return ($rsRootUrlCrosierCore['valor'] ?? '') . '/';
    }


    private function getPriorityLandingUrl(User $user): string
    {
        /**
         * Modelo do landing_urls.json possível é:
         *
         * {
         *   "users": {
         *     "usuario01": {
         *       "app": "crosierapp-pltr",
         *       "url": "v/ranking/competidor"
         *     }
         *   },
         *   "roles": {
         *     "ROLE_PLTR_COMPETIDOR": {
         *       "app": "crosierapp-pltr",
         *       "url": "v/ranking/competidor"
         *     },
         *     "ROLE_PLTR_ADMIN": {
         *       "app": "crosierapp-pltr",
         *       "url": "v/ranking/admin"
         *     }
         *   },
         *   "*": {
         *     "app": "crosierapp-pltr",
         *     "url": ""
         *   }
         * }
         */
        $landingUrls = $this->getLandingUrls();

        $landingUrl = $landingUrls['users'][$user->getUsername()] ?? null;

        if ($landingUrl) {
            return $this->getRootUrl($landingUrl['app']) . $landingUrls['url'];
        }

        if ($landingUrls['roles'] ?? false) {
            foreach ($user->getRoles() as $role) {
                if ($landingUrls['roles'][$role] ?? false) {
                    return $this->getRootUrl($landingUrls['roles'][$role]['app']) . $landingUrls['roles'][$role]['url'];
                }
            }
        }

        if ($landingUrls['*'] ?? false) {
            return $this->getRootUrl($landingUrls['*']['app']) . $landingUrls['*']['url'];
        }

        return '';
    }

    private function getLandingUrls(): array
    {
        $conn = $this->userEntityHandler->getDoctrine()->getConnection();
        $rs = $conn->fetchAssociative(
            'SELECT valor FROM cfg_app_config WHERE chave = :chave AND app_uuid IN (SELECT uuid FROM cfg_app WHERE nome = :appNome)',
            [
                'chave' => 'landing_urls.json',
                'appNome' => 'crosier-core',
            ]
        );
        return json_decode($rs['valor'] ?? '[]', true);
    }


    /**
     * @required
     */
    public function setRouter(RouterInterface $router): void
    {
        $this->router = $router;
    }

    /**
     * @required
     */
    public function setCsrfTokenManager(CsrfTokenManagerInterface $csrfTokenManager): void
    {
        $this->csrfTokenManager = $csrfTokenManager;
    }

    /**
     * @required
     */
    public function setPasswordEncoder(UserPasswordHasherInterface $passwordEncoder): void
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @required
     */
    public function setUserEntityHandler(UserEntityHandler $userEntityHandler): void
    {
        $this->userEntityHandler = $userEntityHandler;
    }

    /**
     * @required
     */
    public function setSecurity(Security $security): void
    {
        $this->security = $security;
    }

    /**
     * @required
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @required
     */
    public function setSyslog(SyslogBusiness $syslog): void
    {
        $this->syslog = $syslog;
    }


    public function start(Request $request, AuthenticationException $authException = null)
    {
        if (strpos($request->getPathInfo(), '/api') === false) {
            if (!$request->getSession()->get('uri_to_redirect_after_login')) {
                // pois pode ter sido setado em outro app
                $request->getSession()->set('uri_to_redirect_after_login', $request->getUri());
            }
            return new RedirectResponse('/login');
        } else {
            return new JsonResponse(['msg' => 'not logged']);
        }

    }


}
