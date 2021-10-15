<?php

namespace App\Controller;

use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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


}
