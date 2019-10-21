<?php

namespace App\Controller;

use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var SessionInterface
     */
    private $session;


    /**
     * @required
     * @param mixed $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @required
     * @param SessionInterface $session
     */
    public function setSession(SessionInterface $session): void
    {
        $this->session = $session;
    }


    /**
     *
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->doRender('dashboard.html.twig');
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
     * @Route("/do1", name="do1")
     */
    public function doSomething()
    {
        $this->session->set('bla', 'blablabla');
        return new Response('bla setado');

    }


    /**
     * @Route("/do2", name="do2")
     */
    public function doSomething2()
    {
        return new Response('bla :' . $this->session->get('bla'));

    }

}