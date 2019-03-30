<?php

namespace App\Repository\Base;

use App\Entity\Base\DiaUtil;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade DiaUtil.
 *
 * @author Carlos Eduardo Pauluk
 */
class  DiaUtilRepository extends FilterRepository
{

    public function getEntityClass(): string
    {
        return DiaUtil::class;
    }

    /**
     * @param \DateTime $ini
     * @param \DateTime $fim
     * @param null $comercial
     * @param null $financeiro
     * @return mixed
     */
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

        return $query->getResult();
    }

    /**
     * @param \DateTime $mesAno
     * @return mixed
     */
    public function findDiasUteisByMesAno(\DateTime $mesAno)
    {
        $ini = $mesAno->modify('first day of this month');
        $fim = clone $mesAno;
        $fim = $fim->modify('last day of this month');
        return $this->findDiasUteisBy($ini, $fim);
    }

    /**
     * @param \DateTime $ini
     * @param \DateTime $fim
     * @return mixed
     */
    public function findDiasUteisFinanceirosBy(\DateTime $ini, \DateTime $fim)
    {
        return $this->findDiasUteisBy($ini, $fim, null, true);
    }

    /**
     * @param \DateTime $mesAno
     * @return mixed
     */
    public function findDiasUteisFinanceirosByMesAno(\DateTime $mesAno)
    {
        $ini = $mesAno->modify('first day of this month');
        $fim = clone $mesAno;
        $fim = $fim->modify('last day of this month');
        return $this->findDiasUteisFinanceirosBy($ini, $fim);
    }

    /**
     * @param \DateTime $ini
     * @param \DateTime $fim
     * @return mixed
     */
    public function findDiasUteisComerciaisBy(\DateTime $ini, \DateTime $fim)
    {
        return $this->findDiasUteisBy($ini, $fim, true, null);
    }

    /**
     * @param \DateTime $mesAno
     * @return mixed
     */
    public function findDiasUteisComerciaisByMesAno(\DateTime $mesAno)
    {
        $ini = $mesAno->modify('first day of this month');
        $fim = clone $mesAno;
        $fim = $fim->modify('last day of this month');
        return $this->findDiasUteisComerciaisBy($ini, $fim);
    }

    /**
     * @param \DateTime $dia
     * @return DiaUtil|null
     */
    public function doFindBy(\DateTime $dia): ?DiaUtil
    {
        $dql = 'SELECT d FROM DiaUtil d WHERE d.dia = :dia';

        $em = $this->getEntityManager();
        $query = $em->createQuery($dql);
        $query->setParameters(array(
            $dia
        ));

        return $query->getResult();
    }

    /**
     * Retorna o próximo dia útil financeiro (incluindo o dia passado).
     */
    public function findDiaUtil(\DateTime $dia, bool $prox = true, ?bool $financeiro = null, ?bool $comercial = null): ?\DateTime
    {
        $ini = clone $dia;
        $fim = clone $dia;
        if ($prox) {
            $fim->add(new \DateInterval('P20D'));
        } else {
            $ini->sub(new \DateInterval('P20D'));
            $fim->sub(new \DateInterval('P1D'));
        }

        $lista = $this->findDiasUteisBy($ini, $fim, $comercial, $financeiro);

        if ($prox) {
            if (isset($lista[0])) {
                /** @var DiaUtil $proxDia */
                $proxDia = $lista[0];
                return $proxDia->getDia();
            }
        } else {
            if (isset($lista[count($lista) - 1])) {
                /** @var DiaUtil $diaAnt */
                $diaAnt = $lista[count($lista) - 1];
                return $diaAnt->getDia();
            }
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
        $diasUteisNoMesAno = $this->findDiasUteisFinanceirosByMesAno($mesAno);
        return isset($diasUteisNoMesAno[$ordinal]) ? $diasUteisNoMesAno[$ordinal] : null;
    }


}
