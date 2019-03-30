<?php

namespace App\Controller\Base\API;

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
 *
 * @package App\Controller\Base
 * @author Carlos Eduardo Pauluk
 */
class DiaUtilAPIController extends AbstractController
{

    /** @var LoggerInterface */
    private $logger;

    /**
     *
     * @Route("/api/bse/diaUtil/findDiaUtil", name="api_bse_diaUtil_findDiaUtil")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function findDiaUtil(Request $request): ?JsonResponse
    {
        try {
            $dia = $request->get('dt');
            $dateTimeDia = DateTimeUtils::parseDateStr($dia);

            $prox = (bool)$request->get('prox');
            $financeiro = $request->get('financeiro') ? (bool)$request->get('financeiro') : null;
            $comercial = $request->get('comercial') ? (bool)$request->get('comercial') : null;
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
            if ($diaUtil) {
                $response = new JsonResponse(
                    [
                        'diaUtil' => $diaUtil->format('Y-m-d')
                    ]
                );
                return $response;
            }
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INTERNAL_ERROR
            ))->toJsonResponse();
        }

        return new JsonResponse([]);
    }

    /**
     *
     * @Route("/api/bse/diaUtil/incPeriodo/", name="api_bse_diaUtil_incPeriodo")
     * @param Request $request
     * @return null|JsonResponse
     */
    public function incPeriodo(Request $request): ?JsonResponse
    {
        try {

            $ini = $request->get('ini');
            $dtIni = DateTimeUtils::parseDateStr($ini);
            $fim = $request->get('fim');
            $dtFim = DateTimeUtils::parseDateStr($fim);

            $futuro = (bool)$request->get('futuro');
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INVALID_REQUEST_BODY_FORMAT
            ))->toJsonResponse();
        }

        try {
            $periodo = DateTimeUtils::iteratePeriodoRelatorial($dtIni, $dtFim, $futuro);
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
     * @param Request $request
     * @return null|JsonResponse
     */
    public function findDiasUteisFinanceirosByMesAno(Request $request): ?JsonResponse
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
            /** @var DiaUtilRepository $repo */
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
