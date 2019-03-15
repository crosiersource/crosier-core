<?php

namespace App\EntityHandler\Config;

use App\Entity\Config\App;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * Class AppEntityHandler
 * @package App\EntityHandler\Config
 *
 * @author Carlos Eduardo Pauluk
 */
class AppEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return App::class;
    }
}