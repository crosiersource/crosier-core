<?php

namespace App\Controller\Config\API;

use App\Entity\Config\AppConfig;
use App\Repository\Config\AppConfigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AppConfigAPIController
 *
 * @package App\Controller\Config\API
 * @author Carlos Eduardo Pauluk
 */
class AppConfigAPIController extends AbstractController
{


    /**
     *
     * @Route("/api/cfg/appConfig/getConfigByChave", name="api_bse_pessoa_findByFilters")
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