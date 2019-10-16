<?php

namespace App\Controller\Base;

use App\Form\Base\PessoaContatoType;
use App\Form\Base\PessoaEnderecoType;
use App\Form\Base\PessoaType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Base\Pessoa;
use CrosierSource\CrosierLibBaseBundle\Entity\Base\PessoaContato;
use CrosierSource\CrosierLibBaseBundle\Entity\Base\PessoaEndereco;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Base\PessoaEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Exception\ViewException;
use CrosierSource\CrosierLibBaseBundle\Utils\ExceptionUtils\ExceptionUtils;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

    /**
     * @required
     * @param PessoaEntityHandler $entityHandler
     */
    public function setEntityHandler(PessoaEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['nome'], 'LIKE', 'str', $params)
        ];
    }

    /**
     *
     * @Route("/bse/pessoa/form/{id}", name="bse_pessoa_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param pessoa|null $pessoa
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function form(Request $request, Pessoa $pessoa = null)
    {
        $params = [
            'listView' => 'Base/pessoaList.html.twig',
            'listRoute' => 'bse_pessoa_list',
            'formView' => 'Base/pessoaForm.html.twig',
            'formRoute' => 'bse_pessoa_form',
            'formPageTitle' => 'Pessoa',
            'typeClass' => PessoaType::class
        ];

        return $this->doForm($request, $pessoa, $params);
    }

    /**
     *
     * @Route("/bse/pessoa/list/", name="bse_pessoa_list")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function list(Request $request): Response
    {
        $params = [
            'formView' => 'Base/pessoaForm.html.twig',
            'formRoute' => 'bse_pessoa_form',
            'listView' => 'Base/pessoaList.html.twig',
            'listRoute' => 'bse_pessoa_list',
            'listRouteAjax' => 'bse_pessoa_datatablesJsList',
            'listPageTitle' => 'Pessoas',
            'listId' => 'pessoaList'
        ];
        return $this->doList($request, $params);
    }

    /**
     *
     * @Route("/bse/pessoa/datatablesJsList/", name="bse_pessoa_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws ViewException
     */
    public function datatablesJsList(Request $request): Response
    {
        return $this->doDatatablesJsList($request);
    }

    /**
     *
     * @Route("/bse/pessoa/delete/{id}/", name="bse_pessoa_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Pessoa $pessoa
     * @return RedirectResponse
     */
    public function delete(Request $request, Pessoa $pessoa): RedirectResponse
    {
        return $this->doDelete($request, $pessoa);
    }

    /**
     *
     * @ParamConverter("endereco", class="CrosierSource\CrosierLibBaseBundle\Entity\Base\PessoaEndereco", options={"mapping": {"endereco": "id"}})
     * @ParamConverter("pessoa", class="CrosierSource\CrosierLibBaseBundle\Entity\Base\Pessoa", options={"mapping": {"pessoa": "id"}})
     *
     * @Route("/bse/pessoaEndereco/form/{pessoa}/{endereco}", name="bse_pessoaEndereco_form", defaults={"endereco"=null}, requirements={"pessoa"="\d+","endereco"="\d+"})
     * @param Request $request
     * @param Pessoa|null $pessoa
     * @param PessoaEndereco|null $endereco
     * @return RedirectResponse|Response
     * @throws \Exception
     *
     *
     */
    public function formEndereco(Request $request, Pessoa $pessoa, PessoaEndereco $endereco = null)
    {
        if (!$endereco) {
            $endereco = new PessoaEndereco();
            $endereco->setPessoa($pessoa);
        }

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

        return $this->doRender('Base/pessoaEnderecoForm.html.twig', $parameters);
    }

    /**
     *
     * @Route("/bse/pessoaEndereco/delete/{endereco}/", name="bse_pessoaEndereco_delete", requirements={"endereco"="\d+"})
     * @param Request $request
     * @param PessoaEndereco $endereco
     * @return RedirectResponse
     *
     * @ParamConverter("endereco", class="CrosierSource\CrosierLibBaseBundle\Entity\Base\PessoaEndereco", options={"mapping": {"endereco": "id"}})
     */
    public function deleteEndereco(Request $request, PessoaEndereco $endereco): RedirectResponse
    {
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
     * @ParamConverter("contato", class="CrosierSource\CrosierLibBaseBundle\Entity\Base\PessoaContato", options={"mapping": {"contato": "id"}})
     * @ParamConverter("pessoa", class="CrosierSource\CrosierLibBaseBundle\Entity\Base\Pessoa", options={"mapping": {"pessoa": "id"}})
     *
     * @Route("/bse/pessoaContato/form/{pessoa}/{contato}", name="bse_pessoaContato_form", defaults={"contato"=null}, requirements={"pessoa"="\d+","contato"="\d+"})
     * @param Request $request
     * @param Pessoa|null $pessoa
     * @param PessoaContato|null $contato
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function formContato(Request $request, Pessoa $pessoa, PessoaContato $contato = null)
    {
        if (!$contato) {
            $contato = new PessoaContato();
            $contato->setPessoa($pessoa);
        }

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

        return $this->doRender('Base/pessoaContatoForm.html.twig', $parameters);
    }


    /**
     *
     * @Route("/bse/pessoaContato/delete/{contato}/", name="bse_pessoaContato_delete", requirements={"contato"="\d+"})
     * @param Request $request
     * @param PessoaContato $contato
     * @return RedirectResponse
     *
     * @ParamConverter("contato", class="CrosierSource\CrosierLibBaseBundle\Entity\Base\PessoaContato", options={"mapping": {"contato": "id"}})
     */
    public function deleteContato(Request $request, PessoaContato $contato): RedirectResponse
    {
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