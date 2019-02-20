<?php

namespace App\EntityHandler\Config;

use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
use App\Entity\Config\App;

class ProgramEntityHandler extends EntityHandler
{


    public function getEntityClass()
    {
        return App::class;
    }
}