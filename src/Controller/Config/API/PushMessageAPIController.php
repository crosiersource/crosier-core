<?php

namespace App\Controller\Config\API;

use App\Entity\Config\PushMessage;
use App\EntityHandler\Config\PushMessageEntityHandler;
use App\Repository\Config\PushMessageRepository;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use CrosierSource\CrosierLibBaseBundle\Utils\EntityIdUtils\EntityIdUtils;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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

}