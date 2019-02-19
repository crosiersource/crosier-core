<?php

namespace App\Controller\Security\API;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{

    /**
     *
     * @Route("/sec/api/checkLoginState", name="sec_api_checkLoginState")
     */
    public function checkLoginState()
    {
        // Se chegar até aqui é porque o cliente ainda está autenticado pelo apiToken.
        /** @var User $user */
        $user = $this->getUser();
        return new JsonResponse(
            [
                'username' => $user->getUsername(),
                'apiTokenExpiresAt' => $user->getApiTokenExpiresAt()->format('d/m/Y H:i:s')
            ]
        );
    }

}

