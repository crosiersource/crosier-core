<?php

namespace App\Repository\Base;

use App\Entity\Base\Estado;
use App\Entity\Base\Municipio;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Repository para a entidade Estado.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class EstadoRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Estado::class;
    }

    public function findByUf($nome, $uf)
    {
        $ql = "SELECT e FROM App\Entity\Base\Estado e WHERE e.uf = :uf";
        $query = $this->getEntityManager()->createQuery($ql);
        $query->setParameters(array(
            'uf' => $uf
        ));

        $results = $query->getResult();

        if (count($results) > 1) {
            throw new \Exception("Mais de um Estado encontrado para [" . $uf . "]");
        }

        return count($results) == 1 ? $results[0] : null;
    }


}
