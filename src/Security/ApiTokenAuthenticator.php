<?php

namespace App\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\Repository\Security\UserRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

/**
 * Autenticação por API Token.
 *
 * @package App\Security
 */
class ApiTokenAuthenticator extends AbstractGuardAuthenticator
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(UserRepository $userRepository, LoggerInterface $logger)
    {
        $this->userRepository = $userRepository;
        $this->logger = $logger;
    }

    public function supports(Request $request)
    {
//        // look for header "Authorization: Bearer <token>"
//        headers->has('X-Authorization')
//    && 0 === strpos($request->headers->get('X-Authorization'), 'Bearer ')
        $this->logger->info('ApiTokenAuthenticador supports()');
        return strpos($request->getPathInfo(), '/api/') !== FALSE;
    }

    public function getCredentials(Request $request)
    {
        $this->logger->info('ApiTokenAuthenticador getCredentials()');
        $authorizationHeader = $request->headers->get('X-Authorization');

        // skip beyond "Bearer "
        return $authorizationHeader ? substr($authorizationHeader, 7) : '';
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $this->logger->info('ApiTokenAuthenticador getUser()');
        /** @var User $user */
        $user = $this->userRepository->findOneBy([
            'apiToken' => $credentials
        ]);

        if (!$user) {
            throw new CustomUserMessageAuthenticationException(
                'Token inválido.'
            );
        }

        if ($user->getApiTokenExpiresAt() <= new \DateTime()) {
            throw new CustomUserMessageAuthenticationException(
                'Token expirado.'
            );
        }

        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        $this->logger->info('ApiTokenAuthenticador checkCredentials()');
        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $this->logger->info('ApiTokenAuthenticador onAuthenticationFailure()');
        return new JsonResponse([
            'message' => $exception->getMessageKey()
        ], 401);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $this->logger->info('ApiTokenAuthenticador onAuthenticationSuccess()');
        // allow the request to continue
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        $this->logger->info('ApiTokenAuthenticador start()');
        throw new \Exception('Not used: entry_point from other authentication is used');
    }

    public function supportsRememberMe()
    {
        $this->logger->info('ApiTokenAuthenticador supportsRememberMe()');
        return false;
    }
}
