<?php

namespace App\Controller\Config\API;

use App\Repository\Config\EntMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class EntMenuAPIController extends AbstractController
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
     * @param string $programUUID
     * @return JsonResponse
     */
    public function buildMenu(string $programUUID): JsonResponse
    {
        // Se fizer pelo getRepository, o Security não é injetado no setSecurity com o @required (provável bug no Symfony)
        // $menu = $this->getDoctrine()->getRepository(EntMenu::class)->buildMenuByProgram($programUUID);
        $menu = $this->entMenuRepository->buildMenuByProgram($programUUID);
        return new JsonResponse($menu);
    }

    /**
     * @Route("/api/cfg/entMenu/getEntMenuByProgramUUID/{programUUID}", name="api_cfg_entMenu_getEntMenuByProgramUUID", requirements={"program"="\w{32}"})
     * @param string $programUUID
     * @return JsonResponse
     */
    public function getEntMenuByProgramUUID(string $programUUID): JsonResponse
    {
        // Se fizer pelo getRepository, o Security não é injetado no setSecurity com o @required (provável bug no Symfony)
        // $menu = $this->getDoctrine()->getRepository(EntMenu::class)->buildMenuByProgram($programUUID);
        $menu = $this->entMenuRepository->getEntMenuByProgramUUID($programUUID);
        return new JsonResponse($menu);
    }


}