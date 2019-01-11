<?php

namespace App\Controller\Base;

use App\Entity\Base\Endereco;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use App\EntityHandler\Base\EnderecoEntityHandler;
use App\Form\Base\EnderecoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EnderecoController extends AbstractController
{

    private $routeToRedirect;

    private $entityHandler;

    /**
     * @return EnderecoEntityHandler
     */
    public function getEntityHandler(): EnderecoEntityHandler
    {
        return $this->entityHandler;
    }

    /**
     * @required
     * @param EnderecoEntityHandler $entityHandler
     */
    public function setEntityHandler(EnderecoEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    /**
     * @return mixed
     */
    public function getRouteToRedirect()
    {
        return $this->routeToRedirect;
    }

    /**
     * @param mixed $routeToRedirect
     */
    public function setRouteToRedirect($routeToRedirect): void
    {
        $this->routeToRedirect = $routeToRedirect;
    }


    public function doEnderecoForm(Request $request, EntityId $ref, Endereco $endereco = null)
    {
        if (!$endereco) {
            $endereco = new Endereco();
        }
        $formEndereco = $this->createForm(EnderecoType::class, $endereco);
        $formEndereco->handleRequest($request);

        if ($formEndereco->isSubmitted()) {
            if ($formEndereco->isValid()) {
                $endereco = $formEndereco->getData();
                $ref->addEndereco($endereco);
                $this->getEntityHandler()->save($ref);
                $this->addFlash('success', 'Registro salvo com sucesso!');
                return $this->redirectToRoute($this->getRouteToRedirect(), array('id' => $ref->getId(), '_fragment' => 'enderecos'));
            } else {
                $formEndereco->getErrors(true, false);
            }
        }

        return $this->render('Base/enderecoForm.html.twig', array(
            'ref' => $ref,
            'routeToRedirect' => $this->getRouteToRedirect(),
            'formEndereco' => $formEndereco->createView()
        ));
    }

    public function doEnderecoDelete(Request $request, EntityId $ref, Endereco $endereco)
    {
        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            $this->addFlash('error', 'Erro interno do sistema.');
        } else {
            try {
                $this->getEnderecoEntityHandler()->delete($endereco);
                $this->addFlash('success', 'Registro deletado com sucesso.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erro ao deletar registro.');
            }
        }

        return $this->redirectToRoute($this->getRouteToRedirect(), array('id' => $ref->getId(), '_fragment' => 'enderecos'));
    }

}