<?php

namespace App\Controller\Config;

use App\Entity\Config\PushMessage;
use App\EntityHandler\Config\PushMessageEntityHandler;
use App\Repository\Config\PushMessageRepository;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use CrosierSource\CrosierLibBaseBundle\Utils\EntityIdUtils\EntityIdUtils;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
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

    /**
     * @required
     * @param PushMessageEntityHandler $pushMessageEntityHandler
     */
    public function setPushMessageEntityHandler(PushMessageEntityHandler $pushMessageEntityHandler): void
    {
        $this->pushMessageEntityHandler = $pushMessageEntityHandler;
    }

    /**
     * @Route("/cfg/pushMessage/getNewMessages", name="cfg_pushMessage_getNewMessages")
     */
    public function getNewMessages(): ?JsonResponse
    {
        $this->logger->debug('/cfg/pushMessage/getNewMessages');

        try {
            /** @var PushMessageRepository $pushMessageRepo */
            $pushMessageRepo = $this->getDoctrine()->getRepository(PushMessage::class);
            $pushMessages = $pushMessageRepo->findByFiltersSimpl(
                [
                    ['dtNotif', 'IS_NULL'],
                    ['userDestinatarioId', 'EQ', $this->security->getUser()->getId()]
                ]
            );
            $r = [];
            /** @var PushMessage $pushMessage */
            foreach ($pushMessages as $pushMessage) {
                $pushMessage->setDtNotif(new \DateTime());
                $r[] = EntityIdUtils::serialize($pushMessage);
                $this->pushMessageEntityHandler->save($pushMessage);
            }
            return new JsonResponse($r);
        } catch (\Exception $e) {
            return new JsonResponse('');
        }
    }


}