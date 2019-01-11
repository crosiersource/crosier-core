<?php

namespace App\Business\Base;

use App\Entity\Base\DiaUtil;
use App\Utils\DateTimeUtils;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DiaUtilBusiness
{

    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return RegistryInterface
     */
    public function getDoctrine(): RegistryInterface
    {
        return $this->doctrine;
    }

    public function incPeriodo($proFuturo, $ini, $fim)
    {
        // Como a alteração será nas referências do objeto, é necessário clonar para não alterar o original passado.
        try {
            if ($ini instanceof \DateTime) {
                $ini = clone $ini;
                $fim = clone $fim;
                $dtIni = $ini->setTime(0,0,0,0);
                $dtFim = $fim->setTime(23,59,59,999999);
            } else {
                $dtIni = \DateTime::createFromFormat('Y-m-d', $ini)->setTime(0, 0, 0, 0);
                $dtFim = \DateTime::createFromFormat('Y-m-d', $fim)->setTime(23, 59, 59, 999999);
            }
            $difDias = $dtFim->diff($dtIni)->days;// Se na tela foi informado um período relatorial...

            if (DateTimeUtils::isPeriodoRelatorial($dtIni, $dtFim)) {
                $periodo = DateTimeUtils::iteratePeriodoRelatorial($dtIni, $dtFim, $proFuturo);
            } else {

                if ($difDias == 0) {
                    if ($proFuturo) {
                        $dtIni = $this->getDoctrine()->getRepository(DiaUtil::class)->findProximoDiaUtilComercial($dtIni->add(new \DateInterval('P1D')));
                    } else {
                        $dtIni = $this->getDoctrine()->getRepository(DiaUtil::class)->findAnteriorDiaUtilComercial($dtIni->sub(new \DateInterval('P1D')));
                    }
                    $dtFim = clone $dtIni;
                } else {
                    if (!$proFuturo) {
                        $dtIni = $dtIni->sub(new \DateInterval('P' . ($difDias + 1) . 'D'));
                        $dtFim = $dtFim->sub(new \DateInterval('P' . ($difDias + 1) . 'D'));
                    } else {
                        $dtIni = $dtIni->add(new \DateInterval('P' . ($difDias + 1) . 'D'));
                        $dtFim = $dtFim->add(new \DateInterval('P' . ($difDias + 1) . 'D'));
                    }

                }
                $periodo['dtIni'] = $dtIni->format('Y-m-d');
                $periodo['dtFim'] = $dtFim->format('Y-m-d');
            }

            return $periodo;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao gerar o período.");
        }
    }
}