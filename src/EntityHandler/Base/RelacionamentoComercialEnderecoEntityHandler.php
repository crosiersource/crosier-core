<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\RelacionamentoComercialEndereco;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * EntityHandler para RelacionamentoComercialEndereco.
 *
 * @package App\EntityHandler\Config
 * @author Carlos Eduardo Pauluk
 */
class RelacionamentoComercialEnderecoEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return RelacionamentoComercialEndereco::class;
    }
}