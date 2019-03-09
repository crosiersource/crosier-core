<?php

namespace App\Repository\Config;

use App\Entity\Config\App;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade App.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class AppRepository extends FilterRepository
{

    public function getEntityClass()
    {
        return App::class;
    }

    public function findApps() {
        $dql = "SELECT a FROM App\Entity\Config\App a WHERE a.id != 1";
        $qry = $this->getEntityManager()->createQuery($dql);
        return $qry->getResult();
    }

    public function findDefaultEntMenuApps()
    {
        $dql = "SELECT e FROM App\Entity\Config\EntMenu e JOIN App\Entity\Config\Program p WITH e.programUUID = p.UUID JOIN App\Entity\Config\App a WITH p.appUUID = a.UUID WHERE p.url = '/' AND a.id != 1";
        $qry = $this->getEntityManager()->createQuery($dql);
        return $qry->getResult();
    }

}

