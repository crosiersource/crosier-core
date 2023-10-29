<?php

namespace App\Controller\Config;

use App\Form\Config\EntMenuLocatorType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenu;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenuLocator;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Config\EntMenuLocatorEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Repository\Config\EntMenuRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EntMenuLocatorController.
 *
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class EntMenuLocatorController extends FormListController
{

    /**
     * @required
     * @param EntMenuLocatorEntityHandler $entityHandler
     */
    public function setEntityHandler(EntMenuLocatorEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    /**
     * @Route("/cfg/entMenuLocator/form/{menuUUID}/{entMenuLocator}", name="cfg_entMenuLocator_form", defaults={"entMenuLocator"=null}, requirements={"entMenuLocator"="\d+"})
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function form(Request $request, string $menuUUID, EntMenuLocator $entMenuLocator = null)
    {
        $parameters = [
            'typeClass' => EntMenuLocatorType::class,
            'formRoute' => 'cfg_entMenuLocator_form',
            'formPageTitle' => 'Entrada de Menu'
        ];
        $entMenuLocator = $entMenuLocator ?? new EntMenuLocator();
        $entMenuLocator->menuUUID = $menuUUID;

        $cache = new FilesystemAdapter('entmenulocator', 0, $_SERVER['CROSIER_SESSIONS_FOLDER']);
        $cache->clear();
        return $this->doForm($request, $entMenuLocator, $parameters);
    }


    public function handleRequestOnValid(Request $request, /** @var EntMenuLocator $entMenuLocator */ $entMenuLocator, ?array &$params = []): void
    {
        $entMenuLocator->menuUUID = $request->get('menuUUID');
    }


    /**
     * @param Request $request
     * @param EntityId $entMenuLocator
     * @param string $formRoute
     * @param array|null $formRouteParams
     * @return RedirectResponse
     */
    public function redirectTo(Request $request, EntityId $entMenuLocator, string $formRoute, ?array $formRouteParams = []): RedirectResponse
    {
        /** @var EntMenuRepository $repoEntMenu */
        $repoEntMenu = $this->getDoctrine()->getRepository(EntMenu::class);
        /** @var EntMenuLocator $entMenuLocator */
        $entMenu = $repoEntMenu->findOneBy(['UUID' => $entMenuLocator->menuUUID]);
        return $this->redirectToRoute('cfg_entMenu_list', ['entMenu' => $entMenu->getId(), '_fragment' => 'locators']);
    }

    /**
     *
     * @Route("/cfg/entMenuLocator/delete/{id}/", name="cfg_entMenuLocator_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param EntMenuLocator $entMenuLocator
     * @return RedirectResponse
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function delete(Request $request, EntMenuLocator $entMenuLocator): RedirectResponse
    {
        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            $this->addFlash('error', 'Erro interno do sistema.');
        } else {
            try {
                $this->getEntityHandler()->delete($entMenuLocator);
                $this->addFlash('success', 'Registro deletado com sucesso.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erro ao deletar registro.');
            }
        }
        /** @var EntMenuRepository $repoEntMenu */
        $repoEntMenu = $this->getDoctrine()->getRepository(EntMenu::class);
        /** @var EntMenuLocator $entMenuLocator */
        $entMenu = $repoEntMenu->findOneBy(['UUID' => $entMenuLocator->menuUUID]);
        return $this->redirectToRoute('cfg_entMenu_list', ['entMenu' => $entMenu->getId(), '_fragment' => 'locators']);
    }


}
