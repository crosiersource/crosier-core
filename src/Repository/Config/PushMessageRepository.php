<?php

namespace App\Repository\Config;

use App\Entity\Config\PushMessage;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade PushMessage.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class PushMessageRepository extends FilterRepository
{

    public function getEntityClass(): string
    {
        return PushMessage::class;
    }


}

