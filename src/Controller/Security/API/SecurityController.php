<?php

namespace App\Controller\Security\API;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{

    /** @var LoggerInterface */
    private $logger;

    /**
     * @required
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     *
     * @Route("/api/sec/checkLoginState/", name="sec_api_checkLoginState")
     */
    public function checkLoginState()
    {
        $this->logger->debug('checkLoginState()');
        // Se chegar até aqui é porque o cliente ainda está autenticado pelo apiToken.
        /** @var User $user */
        $user = $this->getUser();
        return new JsonResponse(
            [
                'username' => $user->getUsername(),
                'hasApiToken' => strlen($user->getApiToken()) === 120,
                'apiTokenExpiresAt' => $user->getApiTokenExpiresAt()->format('d/m/Y H:i:s')
            ]
        );
    }

}

