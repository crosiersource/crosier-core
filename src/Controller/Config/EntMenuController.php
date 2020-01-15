<?php

namespace App\Controller\Config;

use App\Form\Config\EntMenuLocatorType;
use App\Form\Config\EntMenuType;
use CrosierSource\CrosierLibBaseBundle\Business\Config\EntMenuBusiness;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenu;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenuLocator;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Config\EntMenuEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Repository\Config\EntMenuRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function form(Request $request, EntMenu $entMenu = null)
    {
        $parameters = [
            'typeClass' => EntMenuType::class,
            'formRoute' => 'cfg_entMenu_form',
            'formView' => 'Config/entMenuForm.html.twig',
            'formPageTitle' => 'Entrada de Menu'
        ];
        if (!$entMenu) {
            $entMenu = new EntMenu();
        }
        $pai = $request->query->get('pai');
        if ($pai) {
            /** @var EntMenu $pai */
            $pai = $this->getDoctrine()->getRepository(EntMenu::class)->find($pai);
            $entMenu->setPaiUUID($pai->getUUID());
            $parameters['pai'] = $request->get('pai');
            $parameters['routeParams']['pai'] = $parameters['pai'];
        }
        /** @var EntMenuRepository $repoEntMenu */
        $repoEntMenu = $this->getDoctrine()->getRepository(EntMenu::class);
        $repoEntMenu->fillTransients($entMenu);

        return $this->doForm($request, $entMenu, $parameters);
    }

    /**
     *
     * @Route("/cfg/entMenu/list/{entMenu}", name="cfg_entMenu_list", requirements={"entMenu"="\d+"})
     * @param Request $request
     * @param EntMenu $entMenu
     * @return Response
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function list(Request $request, EntMenu $entMenu): Response
    {
        $dados = null;
        /** @var EntMenuRepository $repo */
        $repo = $this->getDoctrine()->getRepository(EntMenu::class);
        $dados = $repo->makeTree($entMenu);
        $params['dados'] = $dados;
        $params['entMenu'] = $entMenu;

        /** @var EntMenuRepository $repoEntMenuLocator */
        $repoEntMenuLocator = $this->getDoctrine()->getRepository(EntMenuLocator::class);
        $locators = $repoEntMenuLocator->findBy(['menuUUID' => $entMenu->getUUID()]);

        foreach ($locators as $locator) {
            $params['locators']['e'][] = $locator;
            $params['locators']['form'][] = $this->createForm(EntMenuLocatorType::class, $locator,
                ['action' => $this->generateUrl('cfg_entMenuLocator_form', ['menuUUID' => $entMenu->getUUID()])])
                ->createView();
        }

        $entMenuLocator = new EntMenuLocator();
        $entMenuLocator->setMenuUUID($entMenu->getUUID());
        $params['formEntMenuLocator'] = $this->createForm(EntMenuLocatorType::class, $entMenuLocator,
            ['action' => $this->generateUrl('cfg_entMenuLocator_form', ['menuUUID' => $entMenu->getUUID()])])
            ->createView();

        return $this->doRender('Config/entMenuList.html.twig', $params);
    }

    /**
     *
     * @Route("/cfg/entMenu/listPais/", name="cfg_entMenu_listPais")
     * @param Request $request
     * @return Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function listPais(Request $request): Response
    {
        $dados = null;
        /** @var EntMenuRepository $repo */
        $repo = $this->getDoctrine()->getRepository(EntMenu::class);
        $dados = $repo->getMenusPais();
        $vParams['dados'] = $dados;
        return $this->doRender('Config/entMenuList_pais.html.twig', $vParams);
    }

    /**
     *
     * @Route("/cfg/entMenu/delete/{id}/", name="cfg_entMenu_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param EntMenu $entMenu
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function delete(Request $request, EntMenu $entMenu): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        if ($entMenu->getPaiUUID()) {
            /** @var EntMenuRepository $repoEntMenu */
            $repoEntMenu = $this->getDoctrine()->getRepository(EntMenu::class);
            $repoEntMenu->fillTransients($entMenu);

            $parameters['listRoute'] = 'cfg_entMenu_list';
            $parameters['listRouteParams'] = ['pai' => $entMenu->getPai()->getId()];
        } else {
            $parameters['listRoute'] = 'cfg_entMenu_listPais';
        }
        return $this->doDelete($request, $entMenu, $parameters);
    }

    /**
     *
     * @Route("/cfg/entMenu/saveOrdem/", name="cfg_entMenu_saveOrdem")
     * @param Request $request
     * @return Response|\Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function saveOrdem(Request $request): JsonResponse
    {
        try {
            $ordArr = json_decode($request->request->get('jsonSortable'));
            $this->entMenuBusiness->saveOrdem($ordArr);
            return new JsonResponse(['result' => 'OK']);
        } catch (\Exception $e) {
            return new JsonResponse(['result' => 'ERRO']);
        }
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
        }

        // else
        $session->set('crosier_menus', null);
        return $this->redirectToRoute('cfg_entMenu_listPais');
    }


}