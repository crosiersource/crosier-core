<?php

namespace App\Repository\Base;

use App\Entity\Base\DiaUtil;
use App\Repository\FilterRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Repository para a entidade DiaUtil.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class  DiaUtilRepository extends FilterRepository
{

    public function getEntityClass()
    {
        return DiaUtil::class;
    }

    public function findDiasUteisBy(\DateTime $ini, \DateTime $fim, $comercial = null, $financeiro = null)
    {
        $ini->setTime(0, 0, 0, 0);
        $fim->setTime(23, 59, 59, 999999);
        $params = array();

        $dql = "SELECT d FROM App\Entity\Base\DiaUtil d WHERE d.dia BETWEEN :ini AND :fim ";

        $params['ini'] = $ini;
        $params['fim'] = $fim;

        if ($comercial !== null) {
            $dql .= " AND d.comercial = :comercial";
            $params['comercial'] = $comercial ? true : false;
        }
        if ($financeiro !== null) {
            $dql .= " AND d.financeiro = :financeiro";
            $params['financeiro'] = $financeiro ? true : false;
        }
        $dql .= " ORDER BY d.dia";

        $em = $this->getEntityManager();

        $query = $em->createQuery($dql);
        $query->setParameters($params);

        // qry.setParameter("ini", CalendarUtil.zeroDate(ini));
        // qry.setParameter("fim", CalendarUtil.to235959(fim));
        $results = $query->getResult();

        return $results;
    }

    public function findDiasUteisByMesAno(\DateTime $mesAno)
    {
        $ini = $mesAno->modify('first day of this month');
        $fim = clone $mesAno;
        $fim = $fim->modify('last day of this month');
        return $this->findDiasUteisBy($ini, $fim);
    }

    public function findDiasUteisFinanceirosBy(\DateTime $ini, \DateTime $fim)
    {
        return $this->findDiasUteisBy($ini, $fim, null, true);
    }

    public function findDiasUteisFinanceirosByMesAno(\DateTime $mesAno)
    {
        $ini = $mesAno->modify('first day of this month');
        $fim = clone $mesAno;
        $fim = $fim->modify('last day of this month');
        return $this->findDiasUteisFinanceirosBy($ini, $fim);
    }

    public function findDiasUteisComerciaisBy(\DateTime $ini, \DateTime $fim)
    {
        return $this->findDiasUteisBy($ini, $fim, true, null);
    }

    public function findDiasUteisComerciaisByMesAno(\DateTime $mesAno)
    {
        $ini = $mesAno->modify('first day of this month');
        $fim = clone $mesAno;
        $fim = $fim->modify('last day of this month');
        return $this->findDiasUteisComerciaisBy($ini, $fim);
    }

    public function doFindBy(\DateTime $dia): ?DiaUtil
    {
        $dql = "SELECT d FROM DiaUtil d WHERE d.dia = :dia";

        $em = $this->getEntityManager();
        $query = $em->createQuery($dql);
        $query->setParameters(array(
            $dia
        ));

        $results = $query->getResult();

        return $results;
    }

    /**
     * Retorna o próximo dia útil financeiro (incluindo o dia passado).
     */
    public function findProximoDiaUtilFinanceiro(\DateTime $dia): ?\DateTime
    {
        $fim = clone $dia;
        $fim->add(new \DateInterval('P20D'));

        $lista = $this->findDiasUteisFinanceirosBy($dia, $fim);

        if (isset($lista[0])) {
            $proxDia = $lista[0];
            return $proxDia->getDia();
        }
        return null;
    }

    /**
     * Retorna o dia útil financeiro anterior ao dia passado (incluindo o dia passado).
     */
    public function findAnteriorDiaUtilFinanceiro(\DateTime $dia): ?\DateTime
    {
        $ini = clone $dia;
        $ini->sub(new \DateInterval('P20D'));

        $lista = $this->findDiasUteisFinanceirosBy($ini, $dia);

        if (isset($lista[count($lista) - 1])) {
            $diaAnt = $lista[count($lista) - 1];
            return $diaAnt->getDia();
        }
        return null;
    }

    /**
     * Retorna o próximo dia útil comercial (incluindo o dia passado).
     */
    public function findProximoDiaUtilComercial(\DateTime $dia): ?\DateTime
    {
        $dia->setTime(0, 0, 0, 0);
        $fim = clone $dia;
        $fim->add(new \DateInterval('P20D'));

        $lista = $this->findDiasUteisComerciaisBy($dia, $fim);

        if (isset($lista[0])) {
            $proxDia = $lista[0];
            return $proxDia->getDia();
        }
        return null;
    }

    /**
     * Retorna o dia útil comercial anterior ao dia passado (incluindo o dia passado).
     */
    public function findAnteriorDiaUtilComercial(\DateTime $dia): ?\DateTime
    {
        $ini = clone $dia;
        $ini->setTime(23, 59, 59, 999999);
        $ini->sub(new \DateInterval('P20D'));

        $lista = $this->findDiasUteisComerciaisBy($ini, $dia);

        if (isset($lista[count($lista) - 1])) {
            $diaAnt = $lista[count($lista) - 1];
            return $diaAnt->getDia();
        }
        return null;
    }

    /**
     * Encontra o enésimo dia útil financeiro do mês.
     *
     * @param \DateTime $mesAno
     * @param int $ordinal
     * @return DiaUtil|NULL
     */
    public function findEnesimoDiaUtilFinanceiroNoMesAno(\DateTime $mesAno, $ordinal): ?DiaUtil
    {
        $diasUteisNoMesAno = $this->findDiasUteisFinanceiroBy($mesAno);
        return isset($diasUteisNoMesAno[$ordinal]) ? $diasUteisNoMesAno[$ordinal] : null;
    }


}
