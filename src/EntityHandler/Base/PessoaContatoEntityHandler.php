<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\PessoaContato;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * EntityHandler para PessoaTelefone.
 *
 * @package App\EntityHandler\Config
 * @author Carlos Eduardo Pauluk
 */
class PessoaContatoEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return PessoaContato::class;
    }
}