<?php

namespace App\Controller\Config\API;

use App\Entity\Config\Program;
use App\Repository\Config\EntMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EntMenuAPIController
 * @package App\Controller\Config\API
 * @author Carlos Eduardo Pauluk
 */
class EntMenuAPIController extends AbstractController
{

    /**
     * @var EntMenuRepository
     */
    private $entMenuRepository;

    /**
     * EntMenuAPIController constructor.
     * @param EntMenuRepository $entMenuRepository
     */
    public function __construct(EntMenuRepository $entMenuRepository)
    {
        $this->entMenuRepository = $entMenuRepository;
    }

    /**
     * @Route("/api/cfg/entMenu/buildMenu/{programUUID}", name="api_cfg_entMenu_buildMenu")
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
     * @Route("/api/cfg/entMenu/getEntMenuByProgramUUID/{programUUID}", name="api_cfg_entMenu_getEntMenuByProgramUUID")
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

    /**
     * @Route("/api/cfg/entMenu/getAppMainProgramUUID/{appUUID}", name="api_cfg_entMenu_getDashboardProgramUUID")
     * @param string $appUUID
     * @return JsonResponse
     */
    public function getAppMainProgramUUID(string $appUUID): JsonResponse
    {
        /** @var Program $program */
        $program = $this->entMenuRepository->findAppMainProgramUUID($appUUID);
        return new JsonResponse(['programUUID' => $program->getUUID()]);
    }


}