<?php

namespace App\Business\Config;

use App\Entity\Config\EntMenu;
use App\EntityHandler\Config\EntMenuEntityHandler;

class EntMenuBusiness
{
    /**
     * @var EntMenuEntityHandler
     */
    private $entityHandler;

    public function __construct(EntMenuEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    public function saveOrdem($ordArr)
    {
        $i = 1;
        foreach ($ordArr as $ord) {
            $entMenu = $this->entityHandler->getDoctrine()->getRepository(EntMenu::class)->find($ord);
            $entMenu->setOrdem($i++);
            $this->entityHandler->save($entMenu);
        }

    }

}

