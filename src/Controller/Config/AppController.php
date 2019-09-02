<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\App;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\AppConfig;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Config\AppConfigEntityHandler;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Config\AppEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Repository\Config\AppConfigRepository;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function form(Request $request, App $app = null)
    {
        $params = [
            'formView' => 'Config/appForm.html.twig',
            'formRoute' => 'cfg_app_form',
            'formPageTitle' => 'App',
        ];
        if ($app) {

            /** @var AppConfigRepository $repoAppConfig */
            $repoAppConfig = $this->getDoctrine()->getRepository(AppConfig::class);
            $app->setConfigs($repoAppConfig->findBy(['appUUID' => $app->getUUID()]));

            if ($request->get('appConfig')) {
                $appConfigArr = $request->get('appConfig');
                if (isset($appConfigArr['chave']) && $appConfigArr['chave']) {
                    $appConfig = new AppConfig();
                    $appConfig->setAppUUID($app->getUUID());
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

        return $this->doForm($request, $app, $params);
    }

    /**
     *
     * @Route("/cfg/app/list/", name="cfg_app_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function list(Request $request): Response
    {
        $params = [
            'listView' => 'Config/appList.html.twig',
            'listRoute' => 'cfg_app_list',
            'listRouteAjax' => 'cfg_app_datatablesJsList',
            'listPageTitle' => 'Apps',
            'listId' => 'appList'
        ];
        return $this->doList($request, $params);
    }

    /**
     *
     * @Route("/cfg/app/datatablesJsList/", name="cfg_app_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
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
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
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
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function deleteAppConfig(Request $request, AppConfig $appConfig): \Symfony\Component\HttpFoundation\RedirectResponse
    {
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
        }
        // else
        return $this->redirectToRoute('cfg_app_list');
    }


}