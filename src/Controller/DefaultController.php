<?php

namespace App\Controller;

use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     *
     * @Route("/", name="index")
     */
    public function index()
    {
        $params['PROGRAM_UUID'] = '72a9aa1dc9024905b60ea8009a9bf50e';
        return $this->render('dashboard.html.twig', $params);
    }

    /**
     * @Route("/logAnError", name="logAnError")
     */
    public function logAnError()
    {
        $this->logger->error('Um erro que não é um erro.');
        return new Response('Errou!');
    }

    /**
     * @Route("/doSomething", name="doSomething")
     */
    public function doSomething()
    {

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