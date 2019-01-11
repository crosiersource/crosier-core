<?php

namespace App\Controller\Security;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use App\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
use App\EntityHandler\Security\UserEntityHandler;
use App\Form\Security\UserType;
use App\Utils\Repository\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController.
 * @package App\Controller\Security
 * @author Carlos Eduardo Pauluk
 */
class UserController extends FormListController
{

    private $entityHandler;

    public function __construct(UserEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    public function getEntityHandler(): ?EntityHandler
    {
        return $this->entityHandler;
    }

    public function getFormRoute()
    {
        return 'sec_user_form';
    }

    public function getFormView()
    {
        return 'Security/userForm.html.twig';
    }

    public function getFilterDatas($params)
    {
        return array(
            new FilterData(['username', 'nome'], 'LIKE', $params['filter']['username'])
        );
    }

    public function getListView()
    {
        return 'Security/userList.html.twig';
    }

    public function getListRoute()
    {
        return 'sec_user_list';
    }


    public function getTypeClass()
    {
        return UserType::class;
    }

    /**
     *
     * @Route("/sec/user/form/{id}", name="sec_user_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param User|null $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \ReflectionException
     */
    public function form(Request $request, User $user = null)
    {
        return $this->doForm($request, $user);
    }

    /**
     *
     * @Route("/sec/user/list/", name="sec_user_list")
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
                'username',
                'nome',
                'email',
                'grupo' => ['groupname']
            )
        );
    }

    /**
     *
     * @Route("/sec/user/datatablesJsList/", name="sec_user_datatablesJsList")
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
     * @Route("/sec/user/delete/{id}/", name="sec_user_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, User $user)
    {
        return $this->doDelete($request, $user);
    }

    public function getListPageTitle()
    {
        return "Usuários do Sistema";
    }

    public function getFormPageTitle() {
        return "Usuário do Sistema";
    }


}