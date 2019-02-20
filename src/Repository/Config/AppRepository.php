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
}
