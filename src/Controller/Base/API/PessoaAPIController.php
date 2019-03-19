<?php

namespace App\Controller\Base\API;

use App\Business\Base\DiaUtilBusiness;
use App\Entity\Base\Pessoa;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PessoaAPIController
 * @package App\Controller\Base\API
 * @author Carlos Eduardo Pauluk
 */
class PessoaAPIController extends BaseAPIEntityIdController
{

    /**
     * @var DiaUtilBusiness
     */
    private $diaUtilBusiness;


    /**
     * @required
     * @param DiaUtilBusiness $diaUtilBusiness
     */
    public function setDiaUtilBusiness(DiaUtilBusiness $diaUtilBusiness): void
    {
        $this->diaUtilBusiness = $diaUtilBusiness;
    }

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Pessoa::class;
    }


    /**
     *
     * @Route("/api/bse/pessoa/findById/{id}", name="api_bse_pessoa_findById", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return parent::findById($id);
    }

    /**
     *
     * @Route("/api/bse/pessoa/findByFilters/", name="api_bse_pessoa_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        return parent::findByFilters($request);
    }
}
