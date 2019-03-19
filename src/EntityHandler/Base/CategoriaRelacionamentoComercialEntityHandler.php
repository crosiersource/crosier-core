<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\CategoriaRelacionamentoComercial;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * EntityHandler para CategoriaRelacionamentoComercial.
 *
 * @package App\EntityHandler\Config
 * @author Carlos Eduardo Pauluk
 */
class CategoriaRelacionamentoComercialEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return CategoriaRelacionamentoComercial::class;
    }
}