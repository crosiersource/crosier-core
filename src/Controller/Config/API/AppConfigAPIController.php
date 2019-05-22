<?php

namespace App\Controller\Config\API;

use App\Entity\Config\AppConfig;
use App\Repository\Config\AppConfigRepository;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AppConfigAPIController
 *
 * @package App\Controller\Config\API
 * @author Carlos Eduardo Pauluk
 */
class AppConfigAPIController extends BaseAPIEntityIdController
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return AppConfig::class;
    }

    /**
     *
     * @Route("/api/cfg/appConfig/findById/{id}", name="api_cfg_appConfig_findById", requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return $this->doFindById($id);
    }

    /**
     *
     * @Route("/api/cfg/appConfig/findByFilters/", name="api_cfg_appConfig_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        return $this->doFindByFilters($request);
    }


    /**
     *
     * @Route("/api/cfg/appConfig/getConfigByChave", name="api_cfg_appConfig_getConfigByChave")
     * @param Request $request
     * @return JsonResponse
     */
    public function getConfigByChave(Request $request): JsonResponse
    {
        try {
            $chave = $request->get('chave');
            $appNome = $request->get('app');

            /** @var AppConfigRepository $appConfigRepo */
            $appConfigRepo = $this->getDoctrine()->getRepository(AppConfig::class);
            $config = $appConfigRepo->findConfigByChaveAndAppNome($chave, $appNome);
            return new JsonResponse(['valor' => $config->getValor()]);
        } catch (\Exception $e) {
            return new JsonResponse('');
        }
    }



}
