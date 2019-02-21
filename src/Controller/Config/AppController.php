<?php

namespace App\Controller\Config;

use App\Entity\Config\App;
use App\EntityHandler\Config\AppEntityHandler;
use App\Form\Config\AppType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AppController.
 *
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class AppController extends FormListController
{

    protected $crudParams =
        [
            'typeClass' => AppType::class,
            'formView' => 'Config/appForm.html.twig',
            'formRoute' => 'cfg_app_form',
            'formPageTitle' => 'App',
            'listView' => 'Config/appList.html.twig',
            'listRoute' => 'cfg_app_list',
            'listRouteAjax' => 'cfg_app_datatablesJsList',
            'listPageTitle' => 'Apps',
            'listId' => 'appList',
            'normalizedAttrib' => [
                'id',
                'nome',
                'obs',
                'entranceUrl',
            ],

        ];

    /**
     * @required
     * @param mixed $entityHandler
     */
    public function setEntityHandler(AppEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['chave', 'valor'], 'LIKE', 'descricao', 'string', $params)
        ];
    }

    /**
     *
     * @Route("/cfg/app/form/{id}", name="cfg_app_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param app|null $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, App $app = null)
    {
        return $this->doForm($request, $app);
    }

    /**
     *
     * @Route("/cfg/app/list/", name="cfg_app_list")
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
     * @Route("/cfg/app/datatablesJsList/", name="cfg_app_datatablesJsList")
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
     * @Route("/cfg/app/delete/{app}/", name="cfg_app_delete", requirements={"app"="\d+"})
     * @param Request $request
     * @param App $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, App $app): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $app);
    }


}