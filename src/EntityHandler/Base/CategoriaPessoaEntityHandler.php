<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\CategoriaPessoa;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * EntityHandler para CategoriaPessoa.
 *
 * @package App\EntityHandler\Config
 * @author Carlos Eduardo Pauluk
 */
class CategoriaPessoaEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return CategoriaPessoa::class;
    }
}