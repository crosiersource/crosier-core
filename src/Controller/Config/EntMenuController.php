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
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
            'listView' => 'Config/entMenuList.html.twig',
            'listRoute' => 'cfg_entMenu_list',
            'listRouteAjax' => null,
            'listPageTitle' => 'Entradas de Menu',
            'listId' => null,
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
        $pai = $this->getDoctrine()->getRepository(EntMenu::class)->find($pai);
        $entMenu->setPai($pai);
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
        $dados = $repo->makeTree();
        $vParams['dados'] = $dados;
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
     * @Route("/cfg/entMenu/getMainMenu", name="cfg_entMenu_getMainMenu")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function getMainMenu(Request $request): Response
    {
        $session = new Session();

        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();
        $serializer = new Serializer([$normalizer], [$encoder]);

        if (!$session->get('mainmenu')) {
            $mainMenuSecured = $this->getDoctrine()->getRepository(EntMenu::class)->getMainMenuSecured();

            $attrs = ['id',
                'label',
                'icon',
                'tipo',
                'cssStyle',
                'app' => ['id', 'route', 'descricao'],
                'filhos' => ['id', 'label', 'icon', 'tipo', 'cssStyle', 'app' => ['id', 'route', 'descricao']]];

            $jMainMenuSecured = $serializer->normalize($mainMenuSecured, 'json', ['attributes' => $attrs]);
            $session->set('mainmenu', $jMainMenuSecured);
        } else {
            $jMainMenuSecured = $session->get('mainmenu');
        }

        return $this->render(
            '/Config/mainmenu.html.twig',
            array('mainMenu' => $jMainMenuSecured)
        );
    }

    /**
     *
     * @Route("/cfg/entMenu/getAppMainMenu", name="cfg_entMenu_getAppMainMenu")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function getAppMainMenu(Request $request): Response
    {
        $session = new Session();

        if (!$session->get('mainmenu')) {
            $mainMenuSecured = $this->getDoctrine()->getRepository(EntMenu::class)->getMainMenuSecured();

            $normalizer = new ObjectNormalizer();
            $encoder = new JsonEncoder();
            $serializer = new Serializer([$normalizer], [$encoder]);

            $attrs = ['id',
                'label',
                'icon',
                'tipo',
                'cssStyle',
                'app' => ['id', 'route', 'descricao'],
                'filhos' => ['id', 'label', 'icon', 'tipo', 'cssStyle', 'app' => ['id', 'route', 'descricao']]];

            $jMainMenuSecured = $serializer->normalize($mainMenuSecured, 'json', ['attributes' => $attrs]);
            $session->set('mainmenu', $jMainMenuSecured);
        } else {
            $jMainMenuSecured = $session->get('mainmenu');
        }

        return $this->render(
            '/Config/mainmenu.html.twig',
            array('mainMenu' => $jMainMenuSecured)
        );
    }

    /**
     *
     * @Route("/cfg/entMenu/clear", name="cfg_entMenu_clear")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function clear(Request $request): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $session = new Session();
        $session->remove('mainmenu');
        return $this->redirectToRoute('cfg_entMenu_list');
    }


}