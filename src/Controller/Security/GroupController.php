<?php

namespace App\Controller\Security;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use App\Entity\Security\Group;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
use App\EntityHandler\Security\GroupEntityHandler;
use App\Form\Security\GroupType;
use App\Utils\Repository\FilterData;
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

    private $entityHandler;

    public function __construct(GroupEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    public function getEntityHandler(): ?EntityHandler
    {
        return $this->entityHandler;
    }

    public function getFormRoute()
    {
        return 'sec_group_form';
    }

    public function getFormView()
    {
        return 'Security/groupForm.html.twig';
    }

    public function getFilterDatas($params)
    {
        return array(
            new FilterData(['groupname'], 'LIKE', $params['filter']['groupname'])
        );
    }

    public function getListView()
    {
        return 'Security/groupList.html.twig';
    }

    public function getListRoute()
    {
        return 'sec_group_list';
    }


    public function getTypeClass()
    {
        return GroupType::class;
    }

    /**
     *
     * @Route("/sec/group/form/{id}", name="sec_group_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Group|null $group
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \ReflectionException
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
     * @throws \ReflectionException
     * @throws \Exception
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
                'groupname'
            )
        );
    }

    /**
     *
     * @Route("/sec/group/datatablesJsList/", name="sec_group_datatablesJsList")
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
     * @Route("/sec/group/delete/{id}/", name="sec_group_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Group $group
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Group $group)
    {
        return $this->doDelete($request, $group);
    }

}