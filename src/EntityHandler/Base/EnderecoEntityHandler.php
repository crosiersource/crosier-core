<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\Endereco;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;


class EnderecoEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return Endereco::class;
    }

    public function persistWith(Endereco $endereco, EntityId $entityId)
    {

    }
}