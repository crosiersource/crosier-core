<?php

namespace App\EntityHandler\Config;

use App\Entity\Config\Modulo;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

class ModuloEntityHandler extends EntityHandler
{


    public function getEntityClass()
    {
        return Modulo::class;
    }
}