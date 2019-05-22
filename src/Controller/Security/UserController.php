<?php

namespace App\Controller\Security;

use App\EntityHandler\Security\UserEntityHandler;
use App\Form\Security\UserType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
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

    protected $crudParams =
        [
            'typeClass' => UserType::class,
            'formView' => 'Security/userForm.html.twig',
            'formRoute' => 'sec_user_form',
            'formPageTitle' => 'Usuário',
            'listView' => 'Security/userList.html.twig',
            'listRoute' => 'sec_user_list',
            'listRouteAjax' => 'sec_user_datatablesJsList',
            'listPageTitle' => 'Usuários do Sistema',
            'listId' => 'userList',

            'normalizedAttrib' => [
                'id',
                'username',
                'nome',
                'email',
                'grupo' => ['groupname']
            ],

            'role_access' => 'ROLE_ADMIN',
            'role_delete' => 'ROLE_ADMIN',

        ];

    /**
     * @required
     * @param UserEntityHandler $entityHandler
     */
    public function setEntityHandler(UserEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas($params): array
    {
        return [
            new FilterData(['username', 'nome'], 'LIKE', 'username', $params)
        ];
    }

    /**
     *
     * @Route("/sec/user/form/{id}", name="sec_user_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param User|null $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
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
     * @throws \Exception
     */
    public function list(Request $request): Response
    {
        return $this->doList($request);
    }

    /**
     *
     * @Route("/sec/user/datatablesJsList/", name="sec_user_datatablesJsList")
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
     * @Route("/sec/user/delete/{id}/", name="sec_user_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, User $id): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $user);
    }


}