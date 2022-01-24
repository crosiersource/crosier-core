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
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Carlos Eduardo Pauluk
 */
class EntMenuController extends FormListController
{

    private EntMenuBusiness $entMenuBusiness;

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
     * @return RedirectResponse|Response
     * @throws Exception
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

        $repoEntMenu = $this->getDoctrine()->getRepository(EntMenu::class);

        $paiId = $request->query->get('pai');
        if (!$entMenu) {
            $entMenu = new EntMenu();
            /** @var EntMenu $pai */
            $pai = $repoEntMenu->find($paiId);
            $entMenu->paiUUID = $pai->UUID;
        }
        $repoEntMenu->fillTransients($entMenu);

        if ($entMenu->pai && ($entMenu->pai->getId() !== (int)$paiId)) {
            return $this->redirectToRoute('cfg_entMenu_form', ['id' => $entMenu->getId(), 'pai' => $entMenu->pai->getId()]);
        }

        if ($entMenu->getId() && $request->get('ent_menu') && ($request->get('ent_menu')['yaml'] ?? false)) {
            $yaml = $request->get('ent_menu')['yaml'];
            $this->entMenuBusiness->recreateFromYaml($entMenu, $yaml);
        }

        return $this->doForm($request, $entMenu, $parameters);
    }

    /**
     *
     * @Route("/cfg/entMenu/list/{entMenu}", name="cfg_entMenu_list", requirements={"entMenu"="\d+"})
     * @param EntMenu $entMenu
     * @return Response
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function list(EntMenu $entMenu): Response
    {
        /** @var EntMenuRepository $repo */
        $repo = $this->getDoctrine()->getRepository(EntMenu::class);
        $dados = $repo->makeTree($entMenu);
        $params['dados'] = $dados;
        $params['entMenu'] = $entMenu;

        /** @var EntMenuRepository $repoEntMenuLocator */
        $repoEntMenuLocator = $this->getDoctrine()->getRepository(EntMenuLocator::class);
        $locators = $repoEntMenuLocator->findBy(['menuUUID' => $entMenu->UUID]);

        foreach ($locators as $locator) {
            $params['locators']['e'][] = $locator;
            $params['locators']['form'][] = $this->createForm(EntMenuLocatorType::class, $locator,
                ['action' => $this->generateUrl('cfg_entMenuLocator_form', ['menuUUID' => $entMenu->UUID])])
                ->createView();
        }

        $entMenuLocator = new EntMenuLocator();
        $entMenuLocator->menuUUID = $entMenu->UUID;
        $params['formEntMenuLocator'] = $this->createForm(EntMenuLocatorType::class, $entMenuLocator,
            ['action' => $this->generateUrl('cfg_entMenuLocator_form', ['menuUUID' => $entMenu->UUID])])
            ->createView();

        $params['export'] = $repo->exportMenuEntries($entMenu);

        return $this->doRender('Config/entMenuList.html.twig', $params);
    }

    /**
     *
     * @Route("/cfg/entMenu/listPais/", name="cfg_entMenu_listPais")
     * @return Response
     * @throws Exception
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function listPais(): Response
    {
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
     * @return RedirectResponse
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function delete(Request $request, EntMenu $entMenu): RedirectResponse
    {
        if ($entMenu->paiUUID) {
            /** @var EntMenuRepository $repoEntMenu */
            $repoEntMenu = $this->getDoctrine()->getRepository(EntMenu::class);
            $repoEntMenu->fillTransients($entMenu);

            $parameters['listRoute'] = 'cfg_entMenu_list';
            $parameters['listRouteParams'] = ['pai' => $entMenu->pai->getId()];
        } else {
            $parameters['listRoute'] = 'cfg_entMenu_listPais';
        }
        return $this->doDelete($request, $entMenu, $parameters);
    }

    /**
     *
     * @Route("/cfg/entMenu/saveOrdem/", name="cfg_entMenu_saveOrdem")
     * @param Request $request
     * @return JsonResponse
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function saveOrdem(Request $request): JsonResponse
    {
        try {
            $ordArr = json_decode($request->request->get('jsonSortable'));
            $this->entMenuBusiness->saveOrdem($ordArr);
            return new JsonResponse(['result' => 'OK']);
        } catch (Exception $e) {
            return new JsonResponse(['result' => 'ERRO']);
        }
    }

    /**
     *
     * @Route("/cfg/entMenu/clear/{entMenu}", name="cfg_entMenu_clear", defaults={"entMenu"=null}, requirements={"entMenu"="\d+"})
     * @param EntMenu|null $entMenu
     * @return RedirectResponse
     */
    public function clear(EntMenu $entMenu = null): RedirectResponse
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