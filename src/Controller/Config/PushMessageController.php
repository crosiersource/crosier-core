<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\CrosierApiResponse;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @author Carlos Eduardo Pauluk
 */
class PushMessageController extends BaseController
{
    private Security $security;


    /**
     * @required
     * @param Security $security
     */
    public function setSecurity(Security $security): void
    {
        $this->security = $security;
    }

    /**
     * @Route("/api/core/config/pushMessage/getListasPush", methods={"GET","HEAD"}, name="api_core_config_pushMessage_getListasPush")
     * @return JsonResponse
     */
    public function getListasPush(): JsonResponse
    {
        try {
            /** @var Connection $conn */
            $conn = $this->getDoctrine()->getConnection();
            $rs = $conn->fetchAssociative(
                'SELECT valor FROM cfg_app_config WHERE chave = :chave AND app_uuid = :appUUID',
                ['chave' => 'listas_push.json', 'appUUID' => $_SERVER['CROSIERAPP_UUID']]);

            $rsListas = json_decode($rs['valor'], true);

            foreach ($rsListas as $rLista) {
                $lista = $rLista;
                $lista['assinada'] = (in_array($this->security->getUser()->getUsername(), $rLista['usuariosAssinantes'], true));
                unset($lista['usuariosAssinantes']);
                $listas[] = $lista;
            }

            return CrosierApiResponse::success($listas);
        } catch (\Throwable $e) {
            return CrosierApiResponse::error($e);
        }
    }


    /**
     * @Route("/api/core/config/pushMessage/assinarListaPush", methods={"POST","HEAD"}, name="api_core_config_pushMessage_assinarListaPush")
     * @return JsonResponse
     */
    public function assinarListaPush(Request $request): JsonResponse
    {
        try {
            $assinaturas = json_decode($request->getContent(), true)['assinaturas'];

            /** @var Connection $conn */
            $conn = $this->getDoctrine()->getConnection();
            $rs = $conn->fetchAssociative(
                'SELECT id, valor FROM cfg_app_config WHERE chave = :chave AND app_uuid = :appUUID',
                ['chave' => 'listas_push.json', 'appUUID' => $_SERVER['CROSIERAPP_UUID']]);

            $appConfig = json_decode($rs['valor'], true);

            foreach ($appConfig as $k => $ac) {
                $achouChave = false;
                foreach ($assinaturas as $chave) {
                    if ($ac['chave'] === $chave) {
                        $achouChave = true;
                        if (!in_array($this->security->getUser()->getUsername(), $ac['usuariosAssinantes'], true)) {
                            $appConfig[$k]['usuariosAssinantes'][] = $this->security->getUser()->getUsername();
                        }
                    }
                }
                if (!$achouChave && in_array($this->security->getUser()->getUsername(), $ac['usuariosAssinantes'], true)) {
                    foreach ($ac['usuariosAssinantes'] as $kk => $v) {
                        if ($v === $this->security->getUser()->getUsername()) {
                            unset($appConfig[$k]['usuariosAssinantes'][$kk]);
                        }
                    }
                }
            }

            $conn->update('cfg_app_config', ['valor' => json_encode($appConfig)], ['id' => $rs['id']]);

            return CrosierApiResponse::success();
        } catch (\Throwable $e) {
            return CrosierApiResponse::error($e);
        }
    }


}