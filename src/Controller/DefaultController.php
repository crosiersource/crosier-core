<?php

namespace App\Controller;

use App\Entity\Config\Modulo;
use CrosierSource\CrosierLibUtilsBundle\RepositoryUtils\WhereBuilder;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @Route("/", name="root")
     */
    public function index()
    {
        $vParams['modulos'] = $this->getDoctrine()->getRepository(Modulo::class)->findAll(WhereBuilder::buildOrderBy('id DESC'));
        return $this->render('main.html.twig', $vParams);
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