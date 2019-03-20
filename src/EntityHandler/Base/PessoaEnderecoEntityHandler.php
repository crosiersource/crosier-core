<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\PessoaEndereco;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * EntityHandler para PessoaEndereco.
 *
 * @package App\EntityHandler\Config
 * @author Carlos Eduardo Pauluk
 */
class PessoaEnderecoEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return PessoaEndereco::class;
    }
}