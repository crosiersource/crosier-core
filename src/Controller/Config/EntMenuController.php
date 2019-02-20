<?php

namespace App\Controller\Config;

use App\Business\Config\EntMenuBusiness;
use App\Entity\Config\EntMenu;
use App\EntityHandler\Config\EntMenuEntityHandler;
use App\Form\Config\EntMenuType;
use App\Repository\Config\EntMenuRepository;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
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

    private $entityHandler;

    private $entMenuBusiness;

    public function __construct(EntMenuEntityHandler $entityHandler, EntMenuBusiness $entMenuBusiness)
    {
        $this->entityHandler = $entityHandler;
        $this->entMenuBusiness = $entMenuBusiness;
    }

    public function getEntityHandler(): ?EntityHandler
    {
        return $this->entityHandler;
    }

    public function getFormRoute()
    {
        return 'cfg_entMenu_form';
    }

    public function getFormView()
    {
        return 'Config/entMenuForm.html.twig';
    }

    public function getFilterDatas($params)
    {
        return array(
            new FilterData(['label'], 'LIKE', isset($params['filter']['label']) ? $params['filter']['label'] : null)
        );
    }

    public function getListView()
    {
        return 'Config/entMenuList.html.twig';
    }

    public function getListRoute()
    {
        return 'cfg_entMenu_list';
    }


    public function getTypeClass()
    {
        return EntMenuType::class;
    }

    /**
     *
     * @Route("/cfg/entMenu/form/{id}", name="cfg_entMenu_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param EntMenu|null $entMenu
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_ADMIN')")
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     */
    public function form(Request $request, EntMenu $entMenu = null)
    {
        if (!$entMenu) {
            $entMenu = new EntMenu();
        }

        $paiId = $request->query->get('pai');
        $pai = $this->getDoctrine()->getRepository(EntMenu::class)->find($paiId);
        $entMenu->setPai($pai);

        $form = $this->createForm(EntMenuType::class, $entMenu, ['action' => $this->generateUrl('cfg_entMenu_form', ['id' => $entMenu->getId(), 'pai' => $paiId])]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entity = $form->getData();
                $this->getEntityHandler()->save($entity);
                $this->addFlash('success', 'Registro salvo com sucesso!');
                return $this->redirectToRoute($this->getFormRoute(), array('id' => $entMenu->getId(), 'pai' => $paiId));
            } else {
                $form->getErrors(true, false);
            }
        }

        // Pode ou não ter vindo algo no $parameters. Independentemente disto, só adiciono form e foi-se.
        $parameters['form'] = $form->createView();
        $parameters['menu'] = 'outro';
        return $this->render($this->getFormView(), $parameters);
    }

    /**
     *
     * @Route("/cfg/entMenu/list/{entMenu}", name="cfg_entMenu_list", requirements={"entMenu"="\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function list(Request $request, EntMenu $entMenu)
    {
        $dados = null;
        $repo = $this->getDoctrine()->getRepository(EntMenu::class);
        $dados = $repo->findBy(['pai' => $entMenu], ['ordem' => 'ASC', 'id' => 'DESC']);
        $dados = array_merge($dados, [$entMenu]);
        $vParams['dados'] = $dados;
        return $this->render($this->getListView(), $vParams);
    }

    /**
     *
     * @Route("/cfg/entMenu/listPais/", name="cfg_entMenu_listPais")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_ADMIN')")
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
    public function delete(Request $request, EntMenu $entMenu)
    {
        return $this->doDelete($request, $entMenu);
    }


    /**
     *
     * @Route("/cfg/entMenu/saveOrdem/", name="cfg_entMenu_saveOrdem")
     * @param Request $request
     * @param EntMenu $entMenu
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
     */
    public function getMainMenu(Request $request)
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
     */
    public function getAppMainMenu(Request $request)
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
    public function clear(Request $request)
    {
        $session = new Session();
        $session->remove('mainmenu');
        return $this->redirectToRoute('cfg_entMenu_list');
    }


}