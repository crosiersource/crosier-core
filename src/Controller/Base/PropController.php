<?php

namespace App\Controller\Base;

use App\Entity\Base\Prop;
use App\EntityHandler\Base\PropEntityHandler;
use App\Form\Base\PropType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PropController.
 * @package App\Controller\Base
 * @author Carlos Eduardo Pauluk
 */
class PropController extends FormListController
{

    protected $crudParams =
        [
            'typeClass' => PropType::class,

            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'bse_prop_form',
            'formPageTitle' => 'Propriedades',
            'form_PROGRAM_UUID' => '',

            'listView' => '@CrosierLibBase/list.html.twig',
            'listRoute' => 'bse_prop_list',
            'listRouteAjax' => 'bse_prop_datatablesJsList',
            'listPageTitle' => 'Propriedades',
            'listId' => 'propList',
            'list_PROGRAM_UUID' => '',
            'listJS' => 'bse/propList.js',

        ];

    /**
     * @required
     * @param PropEntityHandler $entityHandler
     */
    public function setEntityHandler(PropEntityHandler $entityHandler): void
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
     * @Route("/bse/prop/form/{id}", name="bse_prop_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Prop|null $prop
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, Prop $prop = null)
    {
        return $this->doForm($request, $prop);
    }

    /**
     *
     * @Route("/bse/prop/list/", name="bse_prop_list")
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
     * @Route("/bse/prop/datatablesJsList/", name="bse_prop_datatablesJsList")
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
     * @Route("/bse/prop/delete/{id}/", name="bse_prop_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Prop $prop
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Prop $prop): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $prop);
    }


}