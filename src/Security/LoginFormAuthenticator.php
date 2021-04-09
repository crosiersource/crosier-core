<?php

namespace App\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Security\UserEntityHandler;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
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

    private UserPasswordEncoderInterface $passwordEncoder;

    private UserEntityHandler $userEntityHandler;

    private Security $security;

    private LoggerInterface $logger;


    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'login' && $request->isMethod('POST');
    }


    public function authenticate(Request $request): PassportInterface
    {
        $csrfToken = $request->request->get('_csrf_token');
        $username = $request->request->get('username');
        $plaintextPassword = $request->request->get('password');

        $request->getSession()->set(Security::LAST_USERNAME, $username);

        $token = new CsrfToken('authenticate', $csrfToken);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }

        return new Passport(
            new UserBadge($username),
            new PasswordCredentials($plaintextPassword),
            [new RememberMeBadge()]);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
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
        return new RedirectResponse($this->router->generate('login'));
    }


    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        try {
            /** @var User $user */
            $user = $token->getUser();
            $this->userEntityHandler->save($user);
            $this->userEntityHandler->renewTokenApi($user);
            $this->userEntityHandler->fixRoles($user);

            $cache_entmenulocator = new FilesystemAdapter('entmenulocator', 0, $_SERVER['CROSIER_SESSIONS_FOLDER']);
            $cache_entmenulocator->clear();

            $cacheCrosierCoreAssetExtension = new FilesystemAdapter('CrosierCoreAssetExtension', 0, $_SERVER['CROSIER_SESSIONS_FOLDER']);
            // limpa os cachês definidos em CrosierSource\CrosierLibBaseBundle\Twig\CrosierCoreAssetExtension
            $cacheCrosierCoreAssetExtension->clear();

            if ($request->getSession()->get('uri_to_redirect_after_login')) {
                $uri = $request->getSession()->get('uri_to_redirect_after_login');
                $request->getSession()->set('uri_to_redirect_after_login', null);
                return new RedirectResponse($uri);
            }
            return new RedirectResponse($this->router->generate('index'));
        } catch (\Throwable $e) {
            $this->logger->error('Erro em onAuthenticationSuccess');
            $this->logger->error($e->getMessage());
            throw new \RuntimeException('LoginFormAuthenticator - erro');
        }
    }


    /**
     * @required
     * @param RouterInterface $router
     */
    public function setRouter(RouterInterface $router): void
    {
        $this->router = $router;
    }

    /**
     * @required
     * @param CsrfTokenManagerInterface $csrfTokenManager
     */
    public function setCsrfTokenManager(CsrfTokenManagerInterface $csrfTokenManager): void
    {
        $this->csrfTokenManager = $csrfTokenManager;
    }

    /**
     * @required
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function setPasswordEncoder(UserPasswordEncoderInterface $passwordEncoder): void
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @required
     * @param UserEntityHandler $userEntityHandler
     */
    public function setUserEntityHandler(UserEntityHandler $userEntityHandler): void
    {
        $this->userEntityHandler = $userEntityHandler;
    }

    /**
     * @required
     * @param Security $security
     */
    public function setSecurity(Security $security): void
    {
        $this->security = $security;
    }

    /**
     * @required
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }


    public function start(Request $request, AuthenticationException $authException = null)
    {
        if (strpos($request->getPathInfo(), '/api') === FALSE) {
            $request->getSession()->set('uri_to_redirect_after_login', $request->getUri());
            return new RedirectResponse('/login');
        } else {
            return new JsonResponse(['msg' => 'not logged']);
        }

    }


}
