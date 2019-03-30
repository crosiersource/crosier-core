<?php

namespace App\Controller\Base;

use App\Business\Base\PessoaBusiness;
use App\Entity\Base\Pessoa;
use App\Entity\Base\PessoaContato;
use App\Entity\Base\PessoaEndereco;
use App\EntityHandler\Base\PessoaEntityHandler;
use App\Form\Base\PessoaContatoType;
use App\Form\Base\PessoaEnderecoType;
use App\Form\Base\PessoaType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Exception\ViewException;
use CrosierSource\CrosierLibBaseBundle\Utils\ExceptionUtils\ExceptionUtils;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PessoaController
 *
 * @package App\Controller\Base
 * @author Carlos Eduardo Pauluk
 */
class PessoaController extends FormListController
{

    protected $crudParams =
        [
            'typeClass' => PessoaType::class,

            'formView' => 'Base/pessoaForm.html.twig',
            'formRoute' => 'bse_pessoa_form',
            'formPageTitle' => 'Pessoa',

            'listView' => 'Base/pessoaList.html.twig',
            'listRoute' => 'bse_pessoa_list',
            'listRouteAjax' => 'bse_pessoa_datatablesJsList',
            'listPageTitle' => 'Pessoas',
            'listId' => 'pessoaList'
        ];

    /** @var PessoaBusiness */
    private $pessoaBusiness;

    /**
     * @required
     * @param PessoaEntityHandler $entityHandler
     */
    public function setEntityHandler(PessoaEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    /**
     * @required
     * @param mixed $pessoaBusiness
     */
    public function setPessoaBusiness(PessoaBusiness $pessoaBusiness): void
    {
        $this->pessoaBusiness = $pessoaBusiness;
    }


    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['nome'], 'LIKE', 'descricao', $params)
        ];
    }

    /**
     *
     * @Route("/bse/pessoa/form/{id}", name="bse_pessoa_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param pessoa|null $pessoa
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, Pessoa $pessoa = null)
    {
        return $this->doForm($request, $pessoa);
    }

    /**
     *
     * @Route("/bse/pessoa/list/", name="bse_pessoa_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function list(Request $request): Response
    {
        return $this->doList($request);
    }

    /**
     *
     * @Route("/bse/pessoa/datatablesJsList/", name="bse_pessoa_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function datatablesJsList(Request $request): Response
    {
        return $this->doDatatablesJsList($request);
    }

    /**
     *
     * @Route("/bse/pessoa/delete/{pessoa}/", name="bse_pessoa_delete", requirements={"pessoa"="\d+"})
     * @param Request $request
     * @param Pessoa $pessoa
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Pessoa $pessoa): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $pessoa);
    }


    /**
     *
     * @ParamConverter("endereco", class="App\Entity\Base\PessoaEndereco", options={"mapping": {"endereco": "id"}})
     * @ParamConverter("pessoa", class="App\Entity\Base\Pessoa", options={"mapping": {"pessoa": "id"}})
     *
     * @Route("/bse/pessoaEndereco/form/{pessoa}/{endereco}", name="bse_pessoaEndereco_form", defaults={"endereco"=null}, requirements={"pessoa"="\d+","endereco"="\d+"})
     * @param Request $request
     * @param Pessoa|null $pessoa
     * @param PessoaEndereco|null $endereco
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     *
     *
     */
    public function formEndereco(Request $request, Pessoa $pessoa, PessoaEndereco $endereco = null)
    {
        $this->checkAccess($this->crudParams['formRoute']);

        if (!$endereco) {
            $endereco = new PessoaEndereco();
            $endereco->setPessoa($pessoa);
        }

        $this->handleReferer($request);

        $form = $this->createForm(PessoaEnderecoType::class, $endereco);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $endereco = $form->getData();
                    $this->getEntityHandler()->handleSavingEntityId($endereco);
                    if ($endereco->getId() === null) {
                        $pessoa->addEndereco($endereco);
                    }
                    $this->getEntityHandler()->save($pessoa);
                    $this->addFlash('success', 'Registro salvo com sucesso!');
                    return $this->redirectToRoute('bse_pessoa_form', ['id' => $pessoa->getId(), '_fragment' => 'enderecos']);
                } catch (ViewException $e) {
                    $this->addFlash('error', $e->getMessage());
                } catch (\Exception $e) {
                    $msg = ExceptionUtils::treatException($e);
                    $this->addFlash('error', $msg);
                    $this->addFlash('error', 'Erro ao salvar!');
                }
            } else {
                $errors = $form->getErrors(true, true);
                foreach ($errors as $error) {
                    $this->addFlash('error', $error->getMessage());
                }
            }
        }

        // Pode ou não ter vindo algo no $parameters. Independentemente disto, só adiciono form e foi-se.
        $parameters['formEndereco'] = $form->createView();
        $parameters['page_title'] = 'Endereço';
        $parameters['pessoa'] = $pessoa;

        return $this->render('Base/pessoaEnderecoForm.html.twig', $parameters);
    }


    /**
     *
     * @Route("/bse/pessoaEndereco/delete/{endereco}/", name="bse_pessoaEndereco_delete", requirements={"endereco"="\d+"})
     * @param Request $request
     * @param PessoaEndereco $endereco
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @ParamConverter("endereco", class="App\Entity\Base\PessoaEndereco", options={"mapping": {"endereco": "id"}})
     */
    public function deleteEndereco(Request $request, PessoaEndereco $endereco): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $this->checkAccess('bse_pessoaEndereco_delete');

        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            $this->addFlash('error', 'Erro interno do sistema.');
        } else {
            try {
                $pessoa = $endereco->getPessoa();
                $pessoa->removeEndereco($endereco);
                $this->getEntityHandler()->save($pessoa);
                $this->addFlash('success', 'Registro deletado com sucesso.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erro ao deletar registro.');
            }
        }

        return $this->redirectToRoute('bse_pessoa_form', ['id' => $pessoa->getId(), '_fragment' => 'enderecos']);
    }



    /**
     * @ParamConverter("contato", class="App\Entity\Base\PessoaContato", options={"mapping": {"contato": "id"}})
     * @ParamConverter("pessoa", class="App\Entity\Base\Pessoa", options={"mapping": {"pessoa": "id"}})
     *
     * @Route("/bse/pessoaContato/form/{pessoa}/{contato}", name="bse_pessoaContato_form", defaults={"contato"=null}, requirements={"pessoa"="\d+","contato"="\d+"})
     * @param Request $request
     * @param Pessoa|null $pessoa
     * @param PessoaContato|null $contato
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function formContato(Request $request, Pessoa $pessoa, PessoaContato $contato = null)
    {
        $this->checkAccess($this->crudParams['formRoute']);

        if (!$contato) {
            $contato = new PessoaContato();
            $contato->setPessoa($pessoa);
        }

        $this->handleReferer($request);

        $form = $this->createForm(PessoaContatoType::class, $contato);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $contato = $form->getData();
                    $this->getEntityHandler()->handleSavingEntityId($contato);
                    if ($contato->getId() === null) {
                        $pessoa->addContato($contato);
                    }
                    $this->getEntityHandler()->save($pessoa);
                    $this->addFlash('success', 'Registro salvo com sucesso!');
                    return $this->redirectToRoute('bse_pessoa_form', ['id' => $pessoa->getId(), '_fragment' => 'contatos']);
                } catch (ViewException $e) {
                    $this->addFlash('error', $e->getMessage());
                } catch (\Exception $e) {
                    $msg = ExceptionUtils::treatException($e);
                    $this->addFlash('error', $msg);
                    $this->addFlash('error', 'Erro ao salvar!');
                }
            } else {
                $errors = $form->getErrors(true, true);
                foreach ($errors as $error) {
                    $this->addFlash('error', $error->getMessage());
                }
            }
        }

        // Pode ou não ter vindo algo no $parameters. Independentemente disto, só adiciono form e foi-se.
        $parameters['formContato'] = $form->createView();
        $parameters['page_title'] = 'Contato';
        $parameters['pessoa'] = $pessoa;

        return $this->render('Base/pessoaContatoForm.html.twig', $parameters);
    }


    /**
     *
     * @Route("/bse/pessoaContato/delete/{contato}/", name="bse_pessoaContato_delete", requirements={"contato"="\d+"})
     * @param Request $request
     * @param PessoaContato $contato
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @ParamConverter("contato", class="App\Entity\Base\PessoaContato", options={"mapping": {"contato": "id"}})
     */
    public function deleteContato(Request $request, PessoaContato $contato): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $this->checkAccess('bse_pessoaContato_delete');

        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            $this->addFlash('error', 'Erro interno do sistema.');
        } else {
            try {
                $pessoa = $contato->getPessoa();
                $pessoa->removeContato($contato);
                $this->getEntityHandler()->save($pessoa);
                $this->addFlash('success', 'Registro deletado com sucesso.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erro ao deletar registro.');
            }
        }

        return $this->redirectToRoute('bse_pessoa_form', ['id' => $pessoa->getId(), '_fragment' => 'contatos']);
    }


}