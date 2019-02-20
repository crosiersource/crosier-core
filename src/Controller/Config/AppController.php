<?php

namespace App\Controller\Config;

use App\Entity\Config\App;
use App\EntityHandler\Config\AppEntityHandler;
use App\Form\Config\AppType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
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

    /** @var AppEntityHandler */
    private $entityHandler;

    /**
     * @required
     * @param mixed $entityHandler
     */
    public function setEntityHandler(AppEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getEntityHandler(): ?EntityHandler
    {
        return $this->entityHandler;
    }

    public function getFormRoute()
    {
        return 'cfg_app_form';
    }

    public function getFormView()
    {
        return 'Config/appForm.html.twig';
    }

    public function getFilterDatas($params)
    {
        return array(
            new FilterData(['chave', 'valor'], 'LIKE', $params['filter']['descricao'])
        );
    }

    public function getListView()
    {
        return 'Config/appList.html.twig';
    }

    public function getListRoute()
    {
        return 'cfg_app_list';
    }


    public function getTypeClass()
    {
        return AppType::class;
    }

    /**
     *
     * @Route("/cfg/app/form/{id}", name="cfg_app_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param app|null $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, app $app = null)
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
                'app' => ['nome']
            )
        );
    }

    /**
     *
     * @Route("/cfg/app/datatablesJsList/", name="cfg_app_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     */
    public function datatablesJsList(Request $request)
    {
        $jsonResponse = $this->doDatatablesJsList($request);
        return $jsonResponse;
    }

    /**
     *
     * @Route("/cfg/app/delete/{app}/", name="cfg_app_delete", requirements={"app"="\d+"})
     * @param Request $request
     * @param App $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, App $app)
    {
        return $this->doDelete($request, $app);
    }


}