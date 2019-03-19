<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\Pessoa;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * EntityHandler para Pessoa.
 *
 * @package App\EntityHandler\Config
 * @author Carlos Eduardo Pauluk
 */
class PessoaEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return Pessoa::class;
    }
}