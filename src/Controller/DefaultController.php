<?php

namespace App\Controller;

use CrosierSource\CrosierLibUtilsBundle\DateTimeUtils\DateTimeUtils;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     *
     * @Route("/", name="root")
     */
    public function index()
    {
        return $this->render('@CrosierLibBase/index.html.twig');
    }

    /**
     * @Route("/logAnError", name="logAnError")
     */
    public function logAnError() {
        $this->logger->error('Um erro que não é um erro.');
        return new Response('Errou!');
    }



    /**
     * @required
     * @param mixed $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}