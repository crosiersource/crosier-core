<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use App\Entity\Config\Modulo;
use App\EntityHandler\Config\AppEntityHandler;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
use App\Form\Config\AppType;
use App\Utils\Repository\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ModuloController.
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class AppController extends FormListController
{

    private $entityHandler;

    public function __construct(AppEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    public function getEntityHandler(): ?EntityHandler
    {
        return $this->entityHandler;
    }

    public function getFormRoute()
    {
        return 'cfg_modulo_form';
    }

    public function getFormView()
    {
        return 'Config/moduloForm.html.twig';
    }

    public function getFilterDatas($params)
    {
        return array(
            new FilterData(['chave', 'valor'], 'LIKE', $params['filter']['descricao'])
        );
    }

    public function getListView()
    {
        return 'Config/moduloList.html.twig';
    }

    public function getListRoute()
    {
        return 'cfg_modulo_list';
    }


    public function getTypeClass()
    {
        return AppType::class;
    }

    /**
     *
     * @Route("/cfg/modulo/form/{id}", name="cfg_modulo_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param modulo|null $modulo
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function form(Request $request, Modulo $modulo = null)
    {
        return $this->doForm($request, $modulo);
    }

    /**
     *
     * @Route("/cfg/modulo/list/", name="cfg_modulo_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(Request $request)
    {
        return $this->doList($request);
    }

    /**
     * @return array|mixed
     */
    public function getNormalizeAttributes()
    {
        return array(
            'attributes' => array(
                'id',
                'descricao',
                'route',
                'modulo' => ['nome']
            )
        );
    }

    /**
     *
     * @Route("/cfg/modulo/datatablesJsList/", name="cfg_modulo_datatablesJsList")
     * @param Request $request
     * @return Response
     */
    public function datatablesJsList(Request $request)
    {
        $jsonResponse = $this->doDatatablesJsList($request);
        return $jsonResponse;
    }

    /**
     *
     * @Route("/cfg/modulo/delete/{id}/", name="cfg_modulo_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Modulo $modulo
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Modulo $modulo)
    {
        return $this->doDelete($request, $modulo);
    }


}