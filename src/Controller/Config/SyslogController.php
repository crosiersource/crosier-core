<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Exception\ViewException;
use Doctrine\DBAL\Connection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Carlos Eduardo Pauluk
 */
class SyslogController extends AbstractController
{

    /**
     *
     * @Route("/cfg/syslog/list", name="cfg_syslog_list")
     * @param Request $request
     *
     * @param Connection $conn
     * @return \Symfony\Component\HttpFoundation\Response
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function list(Request $request, Connection $conn)
    {
        $params = [];
        $params['filter'] = [];
        $params['tipos'] = ['debug', 'info', 'error'];

        try {
            $where = '';
            $filter = $request->get('filter');
            if ($filter['tipo'] ?? false) {
                $where .= ' WHERE tipo IN (';
                foreach ($filter['tipo'] as $tipo) {
                    if (!in_array($tipo, ['INFO','ERROR','DEBUG'])) {
                        throw new ViewException('tipo n/d INFO,ERROR,DEBUG');
                    }
                    $where .= '\'' . strtolower($tipo) . '\',';
                }
                $where = substr($where, 0, -1) . ')';
                $params['filter']['tipo'] = $filter['tipo'];
            }

            $limit = 500;
            $sql = 'SELECT id, tipo, moment, app, SUBSTRING_INDEX(component,\'\\\\\',-1) AS component_r, component, username, substr(act,1,255) as act, substring(obs,1,255) as obs FROM cfg_syslog ' .
                $where . ' ORDER BY moment DESC LIMIT ' . $limit;
            $qParams = [];
            $rs = $conn->fetchAllAssociative($sql, $qParams);
            $params['rs'] = $rs;
        } catch (\Throwable $e) {
            $this->addFlash('error', 'Erro ao pesquisar syslog');
        }

        return $this->render('Config/syslogList.html.twig', $params);
    }
}