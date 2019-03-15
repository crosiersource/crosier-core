<?php

namespace App\EntityHandler\Config;

use App\Entity\Config\AppConfig;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * Class AppConfigEntityHandler
 * @package App\EntityHandler\Config
 *
 * @author Carlos Eduardo Pauluk
 */
class AppConfigEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return AppConfig::class;
    }
}