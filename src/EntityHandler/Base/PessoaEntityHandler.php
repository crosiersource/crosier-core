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
        $pessoa->setTipo(strlen($pessoa->getDocumento()) === 14 ? 'Pessoa Jurídica' : 'Pessoa Física');


        // Para CASCADEs
        foreach ($pessoa->getEnderecos() as $endereco) {
            $this->handleSavingEntityId($endereco);
        }

        foreach ($pessoa->getContatos() as $contato) {
            $this->handleSavingEntityId($contato);
        }
    }


    public function getEntityClass()
    {
        return Pessoa::class;
    }
}