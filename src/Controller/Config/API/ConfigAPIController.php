<?php

namespace App\Controller\Config\API;

use App\Entity\Config\AppConfig;
use App\Entity\Config\Config;
use App\EntityHandler\Config\ConfigEntityHandler;
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
class ConfigAPIController extends BaseAPIEntityIdController
{

    /** @var ConfigEntityHandler */
    protected $entityHandler;

    /**
     * @required
     * @param ConfigEntityHandler $entityHandler
     */
    public function setEntityHandler(ConfigEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }


    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Config::class;
    }

    /**
     *
     * @Route("/api/cfg/config/findById/{id}", name="api_cfg_config_findById", requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return $this->doFindById($id);
    }

    /**
     *
     * @Route("/api/cfg/config/findByFilters/", name="api_cfg_config_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        return $this->doFindByFilters($request);
    }

    /**
     *
     * @Route("/api/cfg/config/getNew", name="api_cfg_config_getNew")
     * @return JsonResponse
     */
    public function getNew(): JsonResponse
    {
        return $this->doGetNew();
    }

    /**
     *
     * @Route("/api/cfg/config/save", name="api_cfg_config_save")
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse
    {
        return $this->doSave($request);
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