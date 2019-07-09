<?php

namespace App\EntityHandler\Config;

use App\Entity\Config\PushMessage;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * Class PushMessageEntityHandler
 * @package App\EntityHandler\Config
 *
 * @author Carlos Eduardo Pauluk
 */
class PushMessageEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return PushMessage::class;
    }

    public function beforeSave($pushMessage)
    {
        /** @var PushMessage $pushMessage */
        if (!$pushMessage->getId()) {
            if (!$pushMessage->getDtEnvio()) {
                $pushMessage->setDtEnvio(new \DateTime());
            }
        }
    }


}