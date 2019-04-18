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
        $params['PROGRAM_UUID'] = '4f4df268-09ef-4e9c-bbc9-82eaf85de43f';
        return $this->doRender('dashboard.html.twig', $params);
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