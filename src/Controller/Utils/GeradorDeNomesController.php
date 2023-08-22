<?php

namespace App\Controller\Utils;

use CrosierSource\CrosierLibBaseBundle\Business\Utils\GeradorDeNomes;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\CrosierApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GeradorDeNomesController extends AbstractController
{

    /**
     * @Route("/api/utils/gerarNome", name="api_utils_gerarNome")
     */
    public function gerarNome(Request $request): JsonResponse
    {
        $masculino = $request->get('masculino', true);
        return CrosierApiResponse::success(['nome' => GeradorDeNomes::gerarNome($masculino)]);
    }


    

}