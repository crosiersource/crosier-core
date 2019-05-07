<?php

namespace App\Controller\Base;

use App\Entity\Base\CategoriaPessoa;
use App\EntityHandler\Base\CategoriaPessoaEntityHandler;
use App\Form\Base\CategoriaPessoaType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoriaPessoaController
 *
 * @package App\Controller\Base
 * @author Carlos Eduardo Pauluk
 */
class CategoriaPessoaController extends FormListController
{

    protected $crudParams =
        [
            'typeClass' => CategoriaPessoaType::class,

            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'bse_categoriaPessoa_form',
            'formPageTitle' => 'Categoria (Pessoa)',

            'listView' => '@CrosierLibBase/list.html.twig',
            'listRoute' => 'bse_categoriaPessoa_list',
            'listRouteAjax' => 'bse_categoriaPessoa_datatablesJsList',
            'listPageTitle' => 'Categorias (Pessoa)',
            'listId' => 'categoriaPessoaList',
            'listJS' => 'bse/categoriaPessoaList.js'
        ];

    /**
     * @required
     * @param CategoriaPessoaEntityHandler $entityHandler
     */
    public function setEntityHandler(CategoriaPessoaEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['nome'], 'LIKE', 'descricao', $params)
        ];
    }

    /**
     *
     * @Route("/bse/categoriaPessoa/form/{id}", name="bse_categoriaPessoa_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param categoriaPessoa|null $categoriaPessoa
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, CategoriaPessoa $categoriaPessoa = null)
    {
        return $this->doForm($request, $categoriaPessoa);
    }

    /**
     *
     * @Route("/bse/categoriaPessoa/list/", name="bse_categoriaPessoa_list")
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
     * @Route("/bse/categoriaPessoa/datatablesJsList/", name="bse_categoriaPessoa_datatablesJsList")
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
     * @Route("/bse/categoriaPessoa/delete/{categoriaPessoa}/", name="bse_categoriaPessoa_delete", requirements={"categoriaPessoa"="\d+"})
     * @param Request $request
     * @param CategoriaPessoa $categoriaPessoa
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, CategoriaPessoa $categoriaPessoa): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $categoriaPessoa);
    }


}