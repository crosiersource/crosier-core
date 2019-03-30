<?php

namespace App\Controller\Config;

use App\Entity\Config\App;
use App\Entity\Config\AppConfig;
use App\EntityHandler\Config\AppConfigEntityHandler;
use App\EntityHandler\Config\AppEntityHandler;
use App\Form\Config\AppType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
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

    /**
     * @var AppConfigEntityHandler
     */
    private $appConfigEntityHandler;

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

    /**
     * @required
     * @param AppConfigEntityHandler $appConfigEntityHandler
     */
    public function setAppConfigEntityHandler(AppConfigEntityHandler $appConfigEntityHandler): void
    {
        $this->appConfigEntityHandler = $appConfigEntityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['chave', 'valor'], 'LIKE', 'descricao', $params)
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
        if ($app) {
            if ($request->get('appConfig')) {
                $appConfigArr = $request->get('appConfig');
                if (isset($appConfigArr['chave']) && $appConfigArr['chave']) {
                    $appConfig = new AppConfig();
                    $appConfig->setApp($app);
                    $appConfig->setChave($request->get('appConfig')['chave']);
                    $appConfig->setValor($request->get('appConfig')['valor']);
                    $this->appConfigEntityHandler->save($appConfig);
                }
            }

            if ($request->get('appConfigs')) {
                $appConfigs = $request->get('appConfigs');
                foreach ($appConfigs as $id => $appConfigArr) {
                    $appConfig = $this->appConfigEntityHandler->getDoctrine()->getRepository(AppConfig::class)->find($id);
                    $appConfig->setChave($appConfigArr['chave']);
                    $appConfig->setValor($appConfigArr['valor']);
                    $this->appConfigEntityHandler->save($appConfig);
                }
            }


        }

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

    /**
     *
     * @Route("/cfg/appConfig/delete/{appConfig}/", name="cfg_appConfig_delete", requirements={"appConfig"="\d+"})
     * @param Request $request
     * @param AppConfig $appConfig
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAppConfig(Request $request, AppConfig $appConfig): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        // $this->checkAccess($this->crudParams['deleteRoute']);
        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            $this->addFlash('error', 'Erro interno do sistema.');
        } else {
            try {
                $this->appConfigEntityHandler->delete($appConfig);
                $this->addFlash('success', 'Registro deletado com sucesso.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erro ao deletar registro.');
            }
        }
        if ($request->server->get('HTTP_REFERER')) {
            return $this->redirect($request->server->get('HTTP_REFERER'));
        } else {

            return $this->redirectToRoute($this->crudParams['listRoute']);
        }
    }


}