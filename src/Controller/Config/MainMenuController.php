<?php

namespace App\Controller\Config;

use App\Entity\Config\Modulo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainMenuController extends AbstractController
{

    /**
     *
     * @Route("/cfg/mainMenu/build/{app}", name="cfg_mainMenu_build", defaults={"app"=null}, requirements={"app"="\d+"})
     */
    public function build(Modulo $app)
    {
        return new JsonResponse(['modulo' => $app->getNome()]);
    }


}