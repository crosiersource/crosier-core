<?php

namespace App\EntityHandler\Config;

use App\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * Class ProgramEntityHandler
 * @package App\EntityHandler\Config
 *
 * @author Carlos Eduardo Pauluk
 */
class ProgramEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return Program::class;
    }
}