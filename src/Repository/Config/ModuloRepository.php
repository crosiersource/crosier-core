<?php

namespace App\Repository\Config;

use App\Entity\Config\Modulo;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade Modulo.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class ModuloRepository extends FilterRepository
{

    public function getEntityClass()
    {
        return Modulo::class;
    }
}
