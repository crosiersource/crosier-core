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

            $prox = $request->get('prox') ? filter_var($request->get('prox'), FILTER_VALIDATE_BOOLEAN) : null;

            $comercial = $request->get('comercial') ? filter_var($request->get('comercial'), FILTER_VALIDATE_BOOLEAN) : null;
            $financeiro = $request->get('financeiro') ? filter_var($request->get('financeiro'), FILTER_VALIDATE_BOOLEAN) : null;
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
            // Se não achar, apenas incrementa ou decrementa
            if (!$diaUtil) {
                if ($prox) {
                    $dateTimeDia->add(new \DateInterval('P1D'));
                } else {
                    $dateTimeDia->sub(new \DateInterval('P1D'));
                }
                $response = new JsonResponse(
                    [
                        'diaUtil' => $dateTimeDia->format('Y-m-d')
                    ]
                );
                return $response;
            }

            $response = new JsonResponse(
                [
                    'diaUtil' => $diaUtil->format('Y-m-d')
                ]
            );
            return $response;

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

            $futuro = $request->get('futuro') ? filter_var($request->get('futuro'), FILTER_VALIDATE_BOOLEAN) : null;

            $comercial = $request->get('comercial') ? filter_var($request->get('comercial'), FILTER_VALIDATE_BOOLEAN) : null;
            $financeiro = $request->get('financeiro') ? filter_var($request->get('financeiro'), FILTER_VALIDATE_BOOLEAN) : null;
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INVALID_REQUEST_BODY_FORMAT
            ))->toJsonResponse();
        }

        try {
            if ($ini === $fim) {
                $repo = $this->getDoctrine()->getRepository(DiaUtil::class);
                $diaUtil = $repo->findEnesimoDiaUtil($dtIni, $futuro ? 2 : -2, $financeiro, $comercial);
                $periodo = [
                    'dtIni' => $diaUtil->format('Y-m-d'),
                    'dtFim' => $diaUtil->format('Y-m-d'),
                ];
            } else {
                $periodo = DateTimeUtils::iteratePeriodoRelatorial($dtIni, $dtFim, $futuro);
            }
            return new JsonResponse($periodo);
        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INTERNAL_ERROR
            ))->toJsonResponse();
        }
    }

    /**
     * Encontra o próximo dia útil ordinalmente
     *
     * @Route("/api/bse/diaUtil/findEnesimoDiaUtil/", name="api_bse_diaUtil_findEnesimoDiaUtil")
     * @param Request $request
     * @return null|JsonResponse
     */
    public function findEnesimoDiaUtil(Request $request): ?JsonResponse
    {
        try {
            $dtIni = DateTimeUtils::parseDateStr($request->get('dtIni'));

            $ordinal = (int)$request->get('ordinal');
            $comercial = $request->get('comercial') ? filter_var($request->get('comercial'), FILTER_VALIDATE_BOOLEAN) : null;
            $financeiro = $request->get('financeiro') ? filter_var($request->get('financeiro'), FILTER_VALIDATE_BOOLEAN) : null;

        } catch (\Exception $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INVALID_REQUEST_BODY_FORMAT
            ))->toJsonResponse();
        }

        try {
            /** @var DiaUtilRepository $repo */
            $repo = $this->getDoctrine()->getRepository(DiaUtil::class);
            $r = $repo->findEnesimoDiaUtil($dtIni, $ordinal, $financeiro, $comercial);

            $response = new JsonResponse(
                [
                    'diaUtil' => $r->format('Y-m-d')
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
