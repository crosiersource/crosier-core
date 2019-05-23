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
    public function beforeSave($pessoa)
    {
        /** @var Pessoa $pessoa */
        $pessoa->setDocumento(preg_replace("/[\D]/", '', $pessoa->getDocumento()));
    }


    public function getEntityClass()
    {
        return Pessoa::class;
    }
}