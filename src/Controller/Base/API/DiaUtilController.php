<?php

namespace App\Controller\Base\API;

use App\Business\Base\DiaUtilBusiness;
use App\Entity\Base\DiaUtil;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\APIProblem;
use CrosierSource\CrosierLibBaseBundle\Utils\DateTimeUtils\DateTimeUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DiaUtilController
 * @package App\Controller\Base
 */
class DiaUtilController extends AbstractController
{

    /**
     * @var DiaUtilBusiness
     */
    private $diaUtilBusiness;

    public function __construct(DiaUtilBusiness $diaUtilBusiness)
    {
        $this->diaUtilBusiness = $diaUtilBusiness;
    }

    /**
     *
     * @Route("/api/bse/diautil/findProximoDiaUtilFinanceiro/", name="api_bse_diaUtil_findProximoDiaUtilFinanceiro")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function findProximoDiaUtilFinanceiro(Request $request)
    {
        try {
            $json = json_decode($request->getContent(), true);
            $dia = $json[0]['dt'];
            $dateTimeDia = DateTimeUtils::parseDateStr($dia);
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INVALID_REQUEST_BODY_FORMAT
            ))->toJsonResponse();
        }

        try {
            $repo = $this->getDoctrine()->getRepository(DiaUtil::class);
            $diaUtil = $repo->findProximoDiaUtilFinanceiro($dateTimeDia);
            $response = new JsonResponse(
                [
                    'proxDiaUtilFinanceiro' => $diaUtil//->format('Y-m-d')
                ]
            );
            return $response;
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INTERNAL_ERROR
            ))->toJsonResponse();
        }
    }

    /**
     *
     * @Route("/api/bse/diaUtil/incPeriodo/", name="api_bse_diaUtil_incPeriodo")
     *
     */
    public function incPeriodo(Request $request)
    {
        try {
            $json = json_decode($request->getContent(), true);
            $ini = $json[0]['ini'];
            $dtIni = DateTimeUtils::parseDateStr($ini);
            $fim = $json[0]['fim'];
            $dtFim = DateTimeUtils::parseDateStr($fim);

            $futuro = boolval($json[0]['futuro']);
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INVALID_REQUEST_BODY_FORMAT
            ))->toJsonResponse();
        }

        try {
            $periodo = $this->diaUtilBusiness->incPeriodo($futuro, $dtIni, $dtFim);
            return new JsonResponse($periodo);
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INTERNAL_ERROR
            ))->toJsonResponse();
        }
    }
}
