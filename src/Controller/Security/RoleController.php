<?php

namespace App\Controller\Security;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use App\Entity\Security\Role;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
use App\EntityHandler\Security\RoleEntityHandler;
use App\Form\Security\RoleType;
use App\Utils\Repository\FilterData;
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

    private $entityHandler;

    public function __construct(RoleEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    public function getEntityHandler(): ?EntityHandler
    {
        return $this->entityHandler;
    }

    public function getFormRoute()
    {
        return 'sec_role_form';
    }

    public function getFormView()
    {
        return 'Security/roleForm.html.twig';
    }

    public function getFilterDatas($params)
    {
        return array(
            new FilterData(['role'], 'LIKE', $params['filter']['role'])
        );
    }

    public function getListView()
    {
        return 'Security/roleList.html.twig';
    }

    public function getListRoute()
    {
        return 'sec_role_list';
    }


    public function getTypeClass()
    {
        return RoleType::class;
    }

    /**
     *
     * @Route("/sec/role/form/{id}", name="sec_role_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Role|null $role
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \ReflectionException
     */
    public function form(Request $request, Role $role = null)
    {
        return $this->doForm($request, $role);
    }

    /**
     *
     * @Route("/sec/role/list/", name="sec_role_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \ReflectionException
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
                'role',
                'descricao'
            )
        );
    }

    /**
     *
     * @Route("/sec/role/datatablesJsList/", name="sec_role_datatablesJsList")
     * @param Request $request
     * @return Response
     */
    public function datatablesJsList(Request $request)
    {
        $jsonResponse = $this->doDatatablesJsList($request);
        return $jsonResponse;
    }

    /**
     *
     * @Route("/sec/role/delete/{id}/", name="sec_role_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Role $role
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Role $role)
    {
        return $this->doDelete($request, $role);
    }

}