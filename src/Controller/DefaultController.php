<?php

namespace App\Controller;

use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * @author Carlos Eduardo Pauluk
 */
class DefaultController extends BaseController
{

    private LoggerInterface $logger;


    /**
     * @required
     * @param mixed $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     *
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->doRender('dashboard.html.twig');
    }

    /**
     * @Route("/logAnError", name="logAnError")
     */
    public function logAnError(): Response
    {
        $this->logger->error('Um erro que não é um erro.');
        $this->addFlash('error', 'Errou!');
        return $this->doRender('dashboard.html.twig');
    }

    /**
     * @Route("/phpinfo", name="phpinfo")
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function phpinfo(): Response
    {
        phpinfo();
        return new Response('');
    }

    /**
     * @Route("/v/{vuePage}", name="v_vuePage", requirements={"vuePage"=".+"})
     */
    public function vuePage($vuePage): Response
    {
        $cache = new FilesystemAdapter($_SERVER['APP_SECRET'] . '.findValuesTagsDin', 3600, $_SERVER['CROSIER_SESSIONS_FOLDER']);
        $coreUrl = $cache->get('v_vuePage_serverParams', function (ItemInterface $item) {
            $rURL = $this->getDoctrine()->getConnection()->fetchAssociative('SELECT valor FROM cfg_app_config WHERE app_uuid = :appUUID AND chave = :chave', [
                'appUUID' => $_SERVER['APP_SECRET'],
                'chave' => 'URL_' . $_SERVER['CROSIER_ENV']
            ]);
            return $rURL['valor'] ?? 'null';
        });

        $params['serverParams'] = json_encode([
            'coreURL' => $coreUrl,
        ]);

        $params['jsEntry'] = $vuePage;
        return $this->doRender('@CrosierLibBase/vue-app-page.html.twig', $params);
    }

    /**
     * @Route("/vsm/{vuePage}", name="vsm_vuePage", requirements={"vuePage"=".+"})
     */
    public function vuePageSemMenu($vuePage): Response
    {
        $cache = new FilesystemAdapter($_SERVER['APP_SECRET'] . '.findValuesTagsDin', 3600, $_SERVER['CROSIER_SESSIONS_FOLDER']);
        $coreUrl = $cache->get('v_vuePage_serverParams', function (ItemInterface $item) {
            $rURL = $this->getDoctrine()->getConnection()->fetchAssociative('SELECT valor FROM cfg_app_config WHERE app_uuid = :appUUID AND chave = :chave', [
                'appUUID' => $_SERVER['APP_SECRET'],
                'chave' => 'URL_' . $_SERVER['CROSIER_ENV']
            ]);
            return $rURL['valor'] ?? 'null';
        });
        $params['serverParams'] = json_encode([
            'coreURL' => $coreUrl,
            'crosierLogo' => $_SERVER['CROSIER_LOGO'],
        ]);
        $params['jsEntry'] = $vuePage;
        return $this->render('@CrosierLibBase/vue-app-page-semmenu.html.twig', $params);
    }

    /**
     *
     * @Route("/nosec", name="nosec", methods={"GET"})
     * @return Response
     */
    public function nosec(): Response
    {
        return new Response('nosec OK');
    }


}
