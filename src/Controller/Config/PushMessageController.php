<?php

namespace App\Controller\Config;

use App\EntityHandler\Config\PushMessageEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class PushMessageController.
 *
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class PushMessageController extends BaseController
{
    /** @var Security */
    private $security;

    /** @var LoggerInterface */
    private $logger;

    /** @var PushMessageEntityHandler */
    private $pushMessageEntityHandler;

    /**
     * @required
     * @param Security $security
     */
    public function setSecurity(Security $security): void
    {
        $this->security = $security;
    }

    /**
     * @required
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }


}