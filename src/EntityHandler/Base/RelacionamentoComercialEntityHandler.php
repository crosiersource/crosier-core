<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\RelacionamentoComercial;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * EntityHandler para RelacionamentoComercial.
 *
 * @package App\EntityHandler\Config
 * @author Carlos Eduardo Pauluk
 */
class RelacionamentoComercialEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return RelacionamentoComercial::class;
    }
}