<?php

namespace App\EntityHandler\Base;

use App\Entity\Base\EnderecoTrait;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;


class EnderecoEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return EnderecoTrait::class;
    }

    public function persistWith(EnderecoTrait $endereco, EntityId $entityId)
    {

    }
}