<?php

namespace App\Controller\Security;

use App\EntityHandler\Security\GroupEntityHandler;
use App\Form\Security\GroupType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\Group;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GroupController.
 * @package App\Controller\Security
 * @author Carlos Eduardo Pauluk
 */
class GroupController extends FormListController
{

    protected $crudParams =
        [
            'typeClass' => GroupType::class,
            'formView' => 'Security/groupForm.html.twig',
            'formRoute' => 'sec_group_form',
            'formPageTitle' => 'Grupo de Usuários',
            'listView' => 'Security/groupList.html.twig',
            'listRoute' => 'sec_group_list',
            'listRouteAjax' => 'sec_group_datatablesJsList',
            'listPageTitle' => 'Grupos de Usuários',
            'listId' => 'groupList',
            'normalizedAttrib' => [
                'id',
                'groupname'
            ],

        ];

    /**
     * @required
     * @param GroupEntityHandler $entityHandler
     */
    public function setEntityHandler(GroupEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['groupname'], 'LIKE', 'groupname', 'string', $params)
        ];
    }

    /**
     *
     * @Route("/sec/group/form/{id}", name="sec_group_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Group|null $group
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, Group $group = null)
    {
        return $this->doForm($request, $group);
    }

    /**
     *
     * @Route("/sec/group/list/", name="sec_group_list")
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
     * @Route("/sec/group/datatablesJsList/", name="sec_group_datatablesJsList")
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
     * @Route("/sec/group/delete/{id}/", name="sec_group_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Group $group
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Group $group): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $group);
    }

}