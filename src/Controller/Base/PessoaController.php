<?php

namespace App\Controller\Base;

use App\Business\Base\PessoaBusiness;
use App\Entity\Base\Pessoa;
use App\EntityHandler\Base\PessoaEntityHandler;
use App\Form\Base\PessoaType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PessoaController extends FormListController
{

    protected $crudParams =
        [
            'typeClass' => PessoaType::class,
            'formView' => '@CrosierLibBase/form.html.twig',
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
            new FilterData(['nome'], 'LIKE', 'descricao', 'string', $params)
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


}