<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\Prop;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * Class PropEntityHandler
 *
 * @package App\EntityHandler\Base
 * @author Carlos Eduardo Pauluk
 */
class PropEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return Prop::class;
    }
}