<?php

namespace App\Repository\Config;

use App\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Repository para a entidade Program.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class ProgramRepository extends FilterRepository
{

    public function handleFrombyFilters(QueryBuilder $qb)
    {
        return $qb->from($this->getEntityClass(), 'e')
            ->leftJoin('App\Entity\Config\App', 'a', 'WITH', 'e.app = a');
    }

    public function getEntityClass()
    {
        return Program::class;
    }
}
