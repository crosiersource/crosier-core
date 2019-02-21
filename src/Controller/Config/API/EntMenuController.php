<?php

namespace App\Controller\Config\API;

use App\Entity\Config\EntMenu;
use App\Entity\Config\Program;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EntMenuController extends AbstractController
{

    /**
     * @Route("/api/cfg/entMenu/buildMenu/{programUUID}", name="api_cfg_entMenu_buildMenu", requirements={"program"="\w{32}"})
     */
    public function buildMenu(string $programUUID)
    {
        $menu = $this->getDoctrine()->getRepository(EntMenu::class)->buildMenuByProgram($programUUID);
        return new JsonResponse($menu);
    }


}