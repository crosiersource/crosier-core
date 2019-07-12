<?php

namespace App\Controller\Config\API;

use App\Entity\Config\PushMessage;
use App\EntityHandler\Config\PushMessageEntityHandler;
use App\Repository\Config\PushMessageRepository;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use CrosierSource\CrosierLibBaseBundle\Utils\EntityIdUtils\EntityIdUtils;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * Class PushMessageAPIController
 *
 * @package App\Controller\PushMessage\API
 * @author Carlos Eduardo Pauluk
 */
class PushMessageAPIController extends BaseAPIEntityIdController
{


    /** @var PushMessageEntityHandler */
    protected $entityHandler;

    /** @var Security */
    private $security;

    /** @var LoggerInterface */
    protected $logger;

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
     * @param PushMessageEntityHandler $entityHandler
     */
    public function setEntityHandler(PushMessageEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }


    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return PushMessage::class;
    }

    /**
     *
     * @Route("/api/cfg/pushMessage/findById/{id}", name="api_cfg_pushMessage_findById", requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return $this->doFindById($id);
    }

    /**
     *
     * @Route("/api/cfg/pushMessage/findByFilters/", name="api_cfg_pushMessage_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        return $this->doFindByFilters($request);
    }

    /**
     *
     * @Route("/api/cfg/pushMessage/getNew", name="api_cfg_pushMessage_getNew")
     * @return JsonResponse
     */
    public function getNew(): JsonResponse
    {
        return $this->doGetNew();
    }

    /**
     *
     * @Route("/api/cfg/pushMessage/save", name="api_cfg_pushMessage_save")
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse
    {
        return $this->doSave($request);
    }


    /**
     * @Route("/api/cfg/pushMessage/getNewMessages", name="cfg_pushMessage_getNewMessages")
     */
    public function getNewMessages(Request $request): ?JsonResponse
    {
        $this->logger->debug('/cfg/pushMessage/getNewMessages');
        $this->logger->debug('CRSRSESSCK: ' . $request->cookies->get('CRSRSESSCK_CROSIERCORE'));

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
                $this->entityHandler->save($pushMessage);
            }
            return new JsonResponse($r);
        } catch (\Exception $e) {
            return new JsonResponse('');
        }
    }

}