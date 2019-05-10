<?php

namespace App\Controller\Base\API;

use App\Entity\Base\Municipio;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MunicipioAPIController.
 *
 * @package App\Controller\Base\API
 * @author Carlos Eduardo Pauluk
 */
class MunicipioAPIController extends BaseAPIEntityIdController
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Municipio::class;
    }

    /**
     *
     * @Route("/api/bse/municipio/findById/{id}", name="api_bse_municipio_findById", requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return $this->doFindById($id);
    }

    /**
     *
     * @Route("/api/bse/municipio/findByFilters/", name="api_bse_municipio_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        return $this->doFindByFilters($request);
    }


}
