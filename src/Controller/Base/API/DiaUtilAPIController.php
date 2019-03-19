<?php

namespace App\Controller\Base\API;

use App\Business\Base\DiaUtilBusiness;
use App\Entity\Base\DiaUtil;
use App\Repository\Base\DiaUtilRepository;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\APIProblem;
use CrosierSource\CrosierLibBaseBundle\Utils\DateTimeUtils\DateTimeUtils;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DiaUtilController
 * @package App\Controller\Base
 */
class DiaUtilAPIController extends AbstractController
{

    /** @var LoggerInterface */
    private $logger;

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
     * @Route("/api/bse/diaUtil/findDiaUtil/", name="api_bse_diaUtil_findDiaUtil")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function findDiaUtil(Request $request)
    {
        try {
            $this->logger->info($request->getContent());
            $json = json_decode($request->getContent(), true);
            $dia = $json[0]['dt'];
            $dateTimeDia = DateTimeUtils::parseDateStr($dia);

            $prox = (bool)$json[0]['prox'];
            $financeiro = $json[0]['financeiro'];
            $comercial = $json[0]['comercial'];
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INVALID_REQUEST_BODY_FORMAT
            ))->toJsonResponse();
        }

        try {
            /** @var DiaUtilRepository $repo */
            $repo = $this->getDoctrine()->getRepository(DiaUtil::class);
            $diaUtil = $repo->findDiaUtil($dateTimeDia, $prox, $financeiro, $comercial);
            $response = new JsonResponse(
                [
                    'diaUtil' => $diaUtil//->format('Y-m-d')
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

            $futuro = (bool)($json[0]['futuro']);
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

    /**
     *
     * @Route("/api/bse/diaUtil/findDiasUteisFinanceirosByMesAno/", name="api_bse_diaUtil_findDiasUteisFinanceirosByMesAno")
     *
     */
    public function findDiasUteisFinanceirosByMesAno(Request $request)
    {
        try {
            $json = json_decode($request->getContent(), true);
            $mesano = $json[0]['mesano'];
            $mesano = DateTimeUtils::parseDateStr($mesano);
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INVALID_REQUEST_BODY_FORMAT
            ))->toJsonResponse();
        }

        try {
            $repo = $this->getDoctrine()->getRepository(DiaUtil::class);
            $r = $repo->findDiasUteisFinanceirosByMesAno($mesano);
            $diasUteisFinanceiros = [];
            /** @var DiaUtil $diaUtil */
            foreach ($r as $diaUtil) {
                $diasUteisFinanceiros[] = $diaUtil->getDia();
            }

            $response = new JsonResponse(
                [
                    'diasUteisFinanceiros' => $diasUteisFinanceiros
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
     * @required
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

}
