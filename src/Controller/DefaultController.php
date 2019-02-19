<?php

namespace App\Controller;

use App\Entity\Config\Modulo;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\WhereBuilder;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
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
        $vParams['modulos'] = $this->getDoctrine()->getRepository(Modulo::class)->findAll(WhereBuilder::buildOrderBy('ordem'));
        return $this->render('main.html.twig', $vParams);
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
        return $this->render('coreui.html.twig');
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