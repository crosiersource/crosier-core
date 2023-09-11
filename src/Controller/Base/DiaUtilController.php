<?php

namespace App\Controller\Base;

use CrosierSource\CrosierLibBaseBundle\Business\Base\DiaUtilBusiness;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Base\DiaUtil;
use CrosierSource\CrosierLibBaseBundle\Exception\ViewException;
use CrosierSource\CrosierLibBaseBundle\Repository\Base\DiaUtilRepository;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\CrosierApiResponse;
use CrosierSource\CrosierLibBaseBundle\Utils\DateTimeUtils\DateTimeUtils;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Carlos Eduardo Pauluk
 */
class DiaUtilController extends FormListController
{

    private DiaUtilBusiness $diaUtilBusiness;

    /**
     * @required
     * @param DiaUtilBusiness $diaUtilBusiness
     */
    public function setDiaUtilBusiness(DiaUtilBusiness $diaUtilBusiness): void
    {
        $this->diaUtilBusiness = $diaUtilBusiness;
    }


    /**
     *
     * @Route("/bse/diaUtil/list/", name="bse_diaUtil_list")
     * @throws \Exception
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function extrato(Request $request)
    {
        $parameters = $request->query->all();

        if (!array_key_exists('filter', $parameters)) {

            if ($sviParams = $this->storedViewInfoBusiness->retrieve('movimentacao_extrato')) {
                $parameters['filter']['dts'] = $sviParams['dts'];
            } else {
                // inicializa para evitar o erro
                $parameters['filter'] = array();
                $parameters['filter']['dts'] = date('d/m/Y') . ' - ' . date('d/m/Y');
            }
        }

        $dtIni = DateTimeUtils::parseDateStr(substr($parameters['filter']['dts'], 0, 10));
        $dtFim = DateTimeUtils::parseDateStr(substr($parameters['filter']['dts'], 13, 10));

        $parameters['filter']['dt']['i'] = $dtIni->format('Y-m-d');
        $parameters['filter']['dt']['f'] = $dtFim->format('Y-m-d');


        /** @var DiaUtilRepository $repo */
        $repo = $this->doctrine->getRepository(DiaUtil::class);

        $dia = null;
        $dias = array();

        $parameters['dias'] = $dias;

        $prox = $repo->incPeriodo($dtIni, $dtFim, true, true);
        $ante = $repo->incPeriodo($dtIni, $dtFim, false, true);
        $parameters['antePeriodoI'] = $ante['dtIni'];
        $parameters['antePeriodoF'] = $ante['dtFim'];
        $parameters['proxPeriodoI'] = $prox['dtIni'];
        $parameters['proxPeriodoF'] = $prox['dtFim'];
        $parameters['dtFim'] = $dtFim->format('d/m/Y');

        $parameters['page_title'] = 'Dias Úteis';


        $sviParams = [
            'dts' => $parameters['filter']['dts']
        ];
        $this->storedViewInfoBusiness->store('diaUtil_list', $sviParams);


        return $this->doRender('Base/diaUtil_list.html.twig', $parameters);
    }

    /**
     * @param array $params
     * @return array
     */
    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['dia'], 'BETWEEN_DATE', 'dt', $params),
        ];
    }

    /**
     * @Route("/bse/diaUtil/gerarDias/", name="bse_diaUtil_gerarDias")
     * @throws ViewException
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function gerarDias(Request $request): JsonResponse
    {
        $dtIni = DateTimeUtils::parseDateStr($request->get('dtIni') ?? '1970-01-01');
        $dtFim = DateTimeUtils::parseDateStr($request->get('dtIni') ?? '2099-12-31');
        $corrigir = $request->get('corrigir') ?? false;
        $this->diaUtilBusiness->gerarOuCorrigirDiasUteis($dtIni, $dtFim, $corrigir);
        return CrosierApiResponse::success();
    }

    /**
     * @Route("/api/bse/diaUtil/obter", name="api_bse_diaUtil_obter")
     * @IsGranted("IS_AUTHENTICATED_REMEMBERED", statusCode=403)
     */
    public function obter(Request $request): JsonResponse
    {
        try {
            $dt = DateTimeUtils::parseDateStr($request->get('dt'));
            $proximo = filter_var($request->get('proximo'), FILTER_VALIDATE_BOOLEAN);
            $qtdeMeses = $request->get('qtdeMeses') ?? 1;
            /** @var DiaUtilRepository $repo */
            $repo = $this->doctrine->getRepository(DiaUtil::class);

            $diaUtil = $repo->findDiaUtil(DateTimeUtils::incMes($dt, $qtdeMeses), $proximo, true, true, true);
            $dia = $diaUtil->format('Y-m-d');
            return CrosierApiResponse::success($dia);
        } catch (\Exception $e) {
            return CrosierApiResponse::error(null, false, 'Ocorreu um erro ao buscar o dia útil');
        }
    }

    
    /**
     * @Route("/api/bse/diaUtil/obter3", name="api_bse_diaUtil_obter3")
     * @IsGranted("IS_AUTHENTICATED_REMEMBERED", statusCode=403)
     */
    public function obter3(Request $request): JsonResponse
    {
        try {
            $dt = DateTimeUtils::parseDateStr($request->get('dt'));
            $diasEmissao = (int)$request->get('diasEmissao');
            $diasSolicitacao = (int)$request->get('diasSolicitacao');
            
            /** @var DiaUtilRepository $repo */
            $repo = $this->doctrine->getRepository(DiaUtil::class);

            $proximo = false;
            
            $dtMovimentacao = $repo->findDiaUtil(DateTimeUtils::incMes($dt, 1), $proximor, true, true, true);
            
            $dtSolicitacaoBruta = DateTimeUtils::addDays($dtMovimentacao, -$diasSolicitacao);
            $dtSolicitacao = $repo->findDiaUtil($dtSolicitacaoBruta, false, true, true, true);

            $dtEmissaoBruta = DateTimeUtils::addDays($dtMovimentacao, $diasEmissao);
            $dtEmissao = $repo->findDiaUtil($dtEmissaoBruta, false, true, true, true);
            
            return CrosierApiResponse::success([
                'dtMovimentacao' => $dtMovimentacao->format('Y-m-d'),
                'dtSolicitacao' => $dtSolicitacao->format('Y-m-d'),
                'dtEmissao' => $dtEmissao->format('Y-m-d'),
            ]);
        } catch (\Exception $e) {
            return CrosierApiResponse::error(null, false, 'Ocorreu um erro ao buscar o dia útil');
        }
    }


}
