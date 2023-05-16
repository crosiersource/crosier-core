<?php

namespace App\Controller\Base;

use CrosierSource\CrosierLibBaseBundle\Business\Base\DiaUtilBusiness;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Base\DiaUtil;
use CrosierSource\CrosierLibBaseBundle\Repository\Base\DiaUtilRepository;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\CrosierApiResponse;
use CrosierSource\CrosierLibBaseBundle\Utils\DateTimeUtils\DateTimeUtils;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
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
        $repo = $this->getDoctrine()->getRepository(DiaUtil::class);

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
     *
     * @Route("/bse/diaUtil/gerarDias/", name="bse_diaUtil_gerarDias")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function gerarDias(Request $request): JsonResponse
    {
        $maxDia = $request->get('maxDia');
        if (!$maxDia) {
            throw new \RuntimeException('maxDia não informado');
        }
        $dtMaxDia = DateTimeUtils::parseDateStr($maxDia);
        $this->diaUtilBusiness->gerarOuCorrigirDiasUteis($dtMaxDia);
        return CrosierApiResponse::success();
    }


}
