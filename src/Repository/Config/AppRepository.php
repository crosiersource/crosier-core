<?php

namespace App\Repository\Config;

use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use App\Entity\Config\App;
use Doctrine\ORM\QueryBuilder;

/**
 * Repository para a entidade App.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class AppRepository extends FilterRepository
{

    public function handleFrombyFilters(QueryBuilder &$qb)
    {
        return $qb->from($this->getEntityClass(), 'e')
            ->leftJoin('App\Entity\Config\Modulo', 'm', 'WITH', 'e.modulo = m');
    }

    public function getEntityClass()
    {
        return App::class;
    }
}
