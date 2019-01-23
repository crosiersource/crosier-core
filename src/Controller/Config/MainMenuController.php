<?php

namespace App\Controller\Config;

use App\Entity\Config\EntMenu;
use App\Entity\Config\MainMenuItem;
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
        $itens = $this->getDoctrine()->getRepository(MainMenuItem::class)->getAppMainMenuSecured($app);
        return new JsonResponse($itens);
    }


}