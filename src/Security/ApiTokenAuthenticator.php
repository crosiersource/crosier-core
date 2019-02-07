<?php

namespace App\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\Repository\Security\UserRepository;
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

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    public function supports(Request $request)
    {
//        // look for header "Authorization: Bearer <token>"
//        headers->has('X-Authorization')
//    && 0 === strpos($request->headers->get('X-Authorization'), 'Bearer ')
        return strpos($request->getPathInfo(), '/api/') !== FALSE;
    }

    public function getCredentials(Request $request)
    {
        $authorizationHeader = $request->headers->get('X-Authorization');

        // skip beyond "Bearer "

        return $authorizationHeader ? substr($authorizationHeader, 7) : '';
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
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
        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new JsonResponse([
            'message' => $exception->getMessageKey()
        ], 401);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // allow the request to continue
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        throw new \Exception('Not used: entry_point from other authentication is used');
    }

    public function supportsRememberMe()
    {
        return false;
    }
}
