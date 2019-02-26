<?php

namespace App\Controller\Config\API;

use App\Entity\Config\EntMenu;
use App\Entity\Config\Program;
use App\Repository\Config\EntMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EntMenuController extends AbstractController
{

    /**
     * @var EntMenuRepository
     */
    private $entMenuRepository;


    public function __construct(EntMenuRepository $entMenuRepository)
    {
        $this->entMenuRepository = $entMenuRepository;
    }

    /**
     * @Route("/api/cfg/entMenu/buildMenu/{programUUID}", name="api_cfg_entMenu_buildMenu", requirements={"program"="\w{32}"})
     */
    public function buildMenu(string $programUUID)
    {
        // Se fizer pelo getRepository, o Security não é injetado no setSecurity com o @required (provável bug no Symfony)
        // $menu = $this->getDoctrine()->getRepository(EntMenu::class)->buildMenuByProgram($programUUID);
        $menu = $this->entMenuRepository->buildMenuByProgram($programUUID);
        return new JsonResponse($menu);
    }

    /**
     * @Route("/api/cfg/entMenu/getEntMenuByProgramUUID/{programUUID}", name="api_cfg_entMenu_getEntMenuByProgramUUID", requirements={"program"="\w{32}"})
     */
    public function getEntMenuByProgramUUID(string $programUUID)
    {
        // Se fizer pelo getRepository, o Security não é injetado no setSecurity com o @required (provável bug no Symfony)
        // $menu = $this->getDoctrine()->getRepository(EntMenu::class)->buildMenuByProgram($programUUID);
        $menu = $this->entMenuRepository->getEntMenuByProgramUUID($programUUID);
        return new JsonResponse($menu);
    }


}