<?php

namespace App\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\Repository\Security\UserRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

/**
 * Autenticação por API Token.
 *
 * @author Carlos Eduardo Pauluk
 */
class APIAuthenticator extends AbstractAuthenticator implements AuthenticationEntryPointInterface
{

    private UserRepository $userRepository;

    private LoggerInterface $logger;

    
    public function __construct(UserRepository $userRepository, LoggerInterface $logger)
    {
        $this->userRepository = $userRepository;
        $this->logger = $logger;
    }

    public function supports(Request $request): ?bool
    {
        if (strpos($request->getPathInfo(), '/api') === 0 && $this->getXAuthorization($request->headers)) {
            return true;
        } // else
        return false;
    }

    private function getXAuthorization(HeaderBag $headers): ?string
    {
        foreach ($headers->all() as $key => $value) {
            if (strtolower($key) === 'x-authorization') {
                return $value[0];
            }
        }
        return null;
    }

    public function getCredentials(Request $request)
    {
        $authorizationHeader = $this->getXAuthorization($request->headers);
        return $authorizationHeader ? substr($authorizationHeader, 7) : '';
    }

    public function authenticate(Request $request): PassportInterface
    {
        $apiToken = $this->getXAuthorization($request->headers);
        if (null === $apiToken) {
            // The token header was empty, authentication fails with HTTP Status
            // Code 401 "Unauthorized"
            throw new CustomUserMessageAuthenticationException('No API token provided');
        }

        return new SelfValidatingPassport(new UserBadge($apiToken));
    }

    public function getUser($credentials): User
    {
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['apiToken' => $credentials]);

        if (!$user) {
            throw new CustomUserMessageAuthenticationException('Token inválido.');
        }

        if ($user->getApiTokenExpiresAt() <= new \DateTime()) {
            throw new CustomUserMessageAuthenticationException('Token expirado.');
        }

        return $user;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $data = [
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_FORBIDDEN);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $firewallName): ?Response
    {
        $this->logger->info('APIAuthenticator onAuthenticationSuccess()');
        return new JsonResponse(['OK']);
    }

    /**
     * Called when authentication is needed, but it's not sent
     */
    public function start(Request $request, AuthenticationException $authException = null): JsonResponse
    {
        $data = [
            // you might translate this message
            'message' => 'Authentication Required'
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    
}
