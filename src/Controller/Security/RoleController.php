<?php

namespace App\Controller\Security;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\Role;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Security\RoleEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RoleController.
 * @package App\Controller\Security
 * @author Carlos Eduardo Pauluk
 */
class RoleController extends FormListController
{

    /**
     * @required
     * @param RoleEntityHandler $entityHandler
     */
    public function setEntityHandler(RoleEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['role'], 'LIKE', 'role', $params)
        ];
    }

    /**
     *
     * @Route("/sec/role/form/{id}", name="sec_role_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Role|null $role
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, Role $role = null)
    {
        $params = [
            'formView' => 'Security/roleForm.html.twig',
            'formRoute' => 'sec_role_form',
            'formPageTitle' => 'Roles'
        ];
        return $this->doForm($request, $role, $params);
    }

    /**
     *
     * @Route("/sec/role/list/", name="sec_role_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function list(Request $request): Response
    {
        $params = [
            'listView' => 'Security/roleList.html.twig',
            'listRoute' => 'sec_role_list',
            'listRouteAjax' => 'sec_role_datatablesJsList',
            'listPageTitle' => 'Roles',
            'listId' => 'roleList'
        ];
        return $this->doList($request);
    }

    /**
     *
     * @Route("/sec/role/datatablesJsList/", name="sec_role_datatablesJsList")
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
     * @Route("/sec/role/delete/{id}/", name="sec_role_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Role $role
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Role $role): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $role, ['listRoute' => 'sec_role_list']);
    }

}