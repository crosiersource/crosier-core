<?php

namespace App\Controller\Base;

use App\Entity\Base\DiaUtil;
use App\Utils\DateTimeUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiaUtilController extends AbstractController
{


    /**
     * FIXME: passar isso para testes.
     * @Route("/bse/diaUtil/periodos", name="bse_diautil_periodos")
     *
     */
    public function testPeriodos()
    {

        $testes = [
            [
                'dtIni' => '2019-01-01',
                'dtFim' => '2019-01-31',
                'dtIni_dec' => '2018-12-01',
                'dtFim_dec' => '2018-12-31',
                'dtIni_inc' => '2019-02-01',
                'dtFim_inc' => '2019-02-28'
            ],
            [
                'dtIni' => '2019-01-01',
                'dtFim' => '2019-01-15',
                'dtIni_dec' => '2018-12-16',
                'dtFim_dec' => '2018-12-31',
                'dtIni_inc' => '2019-01-16',
                'dtFim_inc' => '2019-01-31'
            ],
            [
                'dtIni' => '2019-01-01',
                'dtFim' => '2019-06-30',
                'dtIni_dec' => '2018-07-01',
                'dtFim_dec' => '2018-12-31',
                'dtIni_inc' => '2019-07-01',
                'dtFim_inc' => '2019-12-31'
            ],
            [
                'dtIni' => '2018-12-16',
                'dtFim' => '2019-01-15',
                'dtIni_dec' => '2018-11-16',
                'dtFim_dec' => '2018-12-15',
                'dtIni_inc' => '2019-01-16',
                'dtFim_inc' => '2019-02-15'
            ],
            [
                'dtIni' => '2018-12-16',
                'dtFim' => '2019-01-31',
                'dtIni_dec' => '2018-11-01',
                'dtFim_dec' => '2018-12-15',
                'dtIni_inc' => '2019-02-01',
                'dtFim_inc' => '2019-03-15'
            ],
            [
                'dtIni' => '2019-10-01',
                'dtFim' => '2020-02-29',
                'dtIni_dec' => '2019-05-01',
                'dtFim_dec' => '2019-09-30',
                'dtIni_inc' => '2020-03-01',
                'dtFim_inc' => '2020-07-31'
            ],
        ];

        $r = "<pre>";
        foreach ($testes as $t) {

            $r .= "<br/>Dt Ini: " . $t['dtIni'] . "<br />" .
                "Dt Fim: " . $t['dtFim'] . "<br />";

            $dtIni = \DateTime::createFromFormat('Y-m-d', $t['dtIni']);
            $dtFim = \DateTime::createFromFormat('Y-m-d', $t['dtFim']);
            $periodo_dec = DateTimeUtils::decPeriodoRelatorial($dtIni, $dtFim);
            $periodo_inc = DateTimeUtils::incPeriodoRelatorial($dtIni, $dtFim);

            if ($periodo_dec['dtIni'] != $t['dtIni_dec']) {
                $r .=
                    "Dt Ini Dec deveria ser: " . $t['dtIni_dec'] . "<br />" .
                    "Retornou como         : " . $periodo_dec['dtIni'] . "<br />";
            }
            if ($periodo_dec['dtFim'] != $t['dtFim_dec']) {
                $r .=
                    "Dt Fim Dec deveria ser: " . $t['dtFim_dec'] . "<br />" .
                    "Retornou como         : " . $periodo_dec['dtFim'] . "<br />";
            }
            if ($periodo_inc['dtIni'] != $t['dtIni_inc']) {
                $r .=
                    "Dt Ini Inc deveria ser: " . $t['dtIni_inc'] . "<br />" .
                    "Retornou como         : " . $periodo_inc['dtIni'] . "<br />";
            }
            if ($periodo_inc['dtFim'] != $t['dtFim_inc']) {
                $r .=
                    "Dt Fim Inc deveria ser: " . $t['dtFim_inc'] . "<br />" .
                    "Retornou como         : " . $periodo_inc['dtFim'] . "<br />";
            }


        }

        return new Response($r);
    }

    /**
     *
     * @Route("/base/diautil/findProximoDiaUtilFinanceiro/", name="findProximoDiaUtilFinanceiro")
     *
     */
    public function findProximoDiaUtilFinanceiro(Request $request)
    {
        if (!$request->get('dia')) {
            return null;
        } else {
            $dia = $request->get('dia');
        }

        $dateTimeDia = \DateTime::createFromFormat('d/m/Y', $dia);
        $dateTimeDia->setTime(0, 0, 0, 0);
        $repo = $this->getDoctrine()->getRepository(DiaUtil::class);
        $diaUtil = $repo->findProximoDiaUtilFinanceiro($dateTimeDia);

        $response = new JsonResponse(array('dia' => $diaUtil->format('d/m/Y')));
        return $response;
    }

    /**
     *
     * @Route("/bse/diaUtil/incPeriodo/{proFuturo}/{ini}/{fim}", name="bse_diaUtil_incPeriodo")
     *
     */
    public function incPeriodo($proFuturo, $ini, $fim)
    {
        try {
            $dtIni = \DateTime::createFromFormat('Y-m-d', $ini);
            $dtFim = \DateTime::createFromFormat('Y-m-d', $fim);
            $difDias = $dtFim->diff($dtIni)->days;// Se na tela foi informado um período relatorial...
            if (DateTimeUtils::isPeriodoRelatorial($dtIni, $dtFim)) {


                $periodoJson = DateTimeUtils::iteratePeriodoRelatorial($dtIni, $dtFim, $proFuturo);

            } else {

                if ($difDias == 0) {
                    if ($proFuturo) {
                        $dtIni = $this->getDoctrine()->getRepository(DiaUtil::class)->findProximoDiaUtilComercial($dtIni->add(new \DateInterval('P1D')));
                    } else {
                        $dtIni = $this->getDoctrine()->getRepository(DiaUtil::class)->findAnteriorDiaUtilComercial($dtIni->add(new \DateInterval('P1D')));
                    }
                    $dtFim = clone $dtIni;
                } else {
                    if (!$proFuturo) {
                        $dtIni = $dtIni->sub(new \DateInterval('P' . $difDias . 'D'))->format('Y-m-d');
                        $dtFim = $dtFim->sub(new \DateInterval('P' . $difDias . 'D'))->format('Y-m-d');
                    } else {
                        $dtIni = $dtIni->add(new \DateInterval('P' . $difDias . 'D'))->format('Y-m-d');
                        $dtFim = $dtFim->add(new \DateInterval('P' . $difDias . 'D'))->format('Y-m-d');
                    }

                }
            }
            $periodo['dtIni'] = $dtIni;
            $periodo['dtFim'] = $dtFim;
            $json = json_encode($periodo);
            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent($json);
            return new Response($json);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao gerar o período.");
        }

    }
}
