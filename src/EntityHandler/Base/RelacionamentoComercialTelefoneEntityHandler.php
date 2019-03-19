<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\RelacionamentoComercialTelefone;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * EntityHandler para RelacionamentoComercialTelefone.
 *
 * @package App\EntityHandler\Config
 * @author Carlos Eduardo Pauluk
 */
class RelacionamentoComercialTelefoneEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return RelacionamentoComercialTelefone::class;
    }
}