<?php

namespace App\Controller\Config;

use App\Business\Config\EntMenuBusiness;
use App\Entity\Config\EntMenu;
use App\EntityHandler\Config\EntMenuEntityHandler;
use App\Form\Config\EntMenuType;
use App\Repository\Config\EntMenuRepository;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EntMenuController.
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class EntMenuController extends FormListController
{

    /** @var EntMenuBusiness */
    private $entMenuBusiness;

    protected $crudParams =
        [
            'typeClass' => EntMenuType::class,

            'formView' => 'Config/entMenuForm.html.twig',
            'formRoute' => 'cfg_entMenu_form',
            'formPageTitle' => 'Entrada de Menu',
            'form_PROGRAM_UUID' => '',

            'listView' => 'Config/entMenuList.html.twig',
            'listRoute' => 'cfg_entMenu_list',
            'listRouteAjax' => null,
            'listPageTitle' => 'Entradas de Menu',
            'listId' => null,
            'list_PROGRAM_UUID' => '',

            'normalizedAttrib' => null,

        ];

    /**
     * @required
     * @param EntMenuEntityHandler $entityHandler
     */
    public function setEntityHandler(EntMenuEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    /**
     * @required
     * @param EntMenuBusiness $entMenuBusiness
     */
    public function setEntMenuBusiness(EntMenuBusiness $entMenuBusiness): void
    {
        $this->entMenuBusiness = $entMenuBusiness;
    }

    /**
     *
     * @Route("/cfg/entMenu/form/{id}", name="cfg_entMenu_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param EntMenu|null $entMenu
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_ADMIN')")
     * @throws \Exception
     */
    public function form(Request $request, EntMenu $entMenu = null)
    {
        if (!$entMenu) {
            $entMenu = new EntMenu();
        }
        $pai = $request->query->get('pai');
        /** @var EntMenu $pai */
        $pai = $this->getDoctrine()->getRepository(EntMenu::class)->find($pai);
        $entMenu->setPaiUUID($pai->getUUID());
        $parameters['pai'] = $request->get('pai');
        return $this->doForm($request, $entMenu, $parameters);
    }

    /**
     *
     * @Route("/cfg/entMenu/list/{entMenu}", name="cfg_entMenu_list", requirements={"entMenu"="\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_ADMIN')")
     * @throws \Exception
     */
    public function list(Request $request, EntMenu $entMenu): Response
    {
        $dados = null;
        /** @var EntMenuRepository $repo */
        $repo = $this->getDoctrine()->getRepository(EntMenu::class);
        $dados = $repo->makeTree($entMenu);
        $vParams['dados'] = $dados;
        $vParams['entMenu'] = $entMenu;
        return $this->render($this->crudParams['listView'], $vParams);
    }

    /**
     *
     * @Route("/cfg/entMenu/listPais/", name="cfg_entMenu_listPais")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_ADMIN')")
     * @throws \Exception
     */
    public function listPais(Request $request): Response
    {
        $dados = null;
        /** @var EntMenuRepository $repo */
        $repo = $this->getDoctrine()->getRepository(EntMenu::class);
        $dados = $repo->getMenusPais();
        $vParams['dados'] = $dados;
        return $this->render('Config/entMenuList_pais.html.twig', $vParams);
    }

    /**
     *
     * @Route("/cfg/entMenu/delete/{id}/", name="cfg_entMenu_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param EntMenu $entMenu
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, EntMenu $entMenu): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $entMenu);
    }

    /**
     *
     * @Route("/cfg/entMenu/saveOrdem/", name="cfg_entMenu_saveOrdem")
     * @param Request $request
     * @return Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function save(Request $request)
    {
        $ordArr = json_decode($request->request->get('jsonSortable'));
        $this->entMenuBusiness->saveOrdem($ordArr);
        return new Response('');

    }

    /**
     *
     * @Route("/cfg/entMenu/clear/{entMenu}", name="cfg_entMenu_clear", defaults={"entMenu"=null}, requirements={"entMenu"="\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function clear(Request $request, EntMenu $entMenu = null): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        // Remove da sessão os menus cacheados pelo BaseController
        $session = new Session();
        $session->set('programs_menus', null);
        if ($entMenu) {
            $crosierMenus = $session->get('crosier_menus');
            $crosierMenus[$entMenu->getId()] = null;
            $session->set('crosier_menus', $crosierMenus);
            return $this->redirectToRoute('cfg_entMenu_list', ['entMenu' => $entMenu->getId()]);
        } else {
            $session->set('crosier_menus', null);
            return $this->redirectToRoute('cfg_entMenu_listPais');
        }
    }


}