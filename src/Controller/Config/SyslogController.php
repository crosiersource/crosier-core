<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use CrosierSource\CrosierLibBaseBundle\Utils\ExceptionUtils\ExceptionUtils;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Carlos Eduardo Pauluk
 */
class SyslogController extends BaseController
{

    /**
     * @Route("/cfg/syslog/getDistinct", methods={"GET", "HEAD"}, name="config_syslog_getDistinct")
     */
    public function getDistinct(Request $request, Connection $conn): JsonResponse
    {
        try {
            $campo = str_replace(' ', '', $request->get('campo'));
            if (!$campo) {
                $r = [
                    'RESULT' => 'ERR',
                    'MSG' => 'campo n/d'
                ];
                return new JsonResponse($r, 400);
            }

            $rsDistincts = $conn->fetchAllAssociative('SELECT distinct(' . $campo . ') FROM cfg_syslog ORDER BY ' . $campo, ['campo' => $campo]);

            if (!$rsDistincts) {
                $r = [
                    'RESULT' => 'ERR',
                    'MSG' => 'Erro ao retornar consulta - getDistinct'
                ];
                return new JsonResponse($r, 400);
            }

            return new JsonResponse(
                [
                    'RESULT' => 'OK',
                    'MSG' => 'Executado com sucesso',
                    'DATA' => [
                        'distincts' => $rsDistincts,
                    ]
                ]
            );
        } catch (\Throwable $e) {
            $msg = ExceptionUtils::treatException($e);
            if (!$msg) {
                $msg = 'Erro - getDistinct';
            }
            $r = [
                'RESULT' => 'ERR',
                'MSG' => $msg
            ];
            return new JsonResponse($r);
        }
    }

}