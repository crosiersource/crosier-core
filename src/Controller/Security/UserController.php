<?php

namespace App\Controller\Security;

use App\Form\Security\UserType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Security\UserEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Exception\ViewException;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

    /**
     * @required
     * @param UserEntityHandler $entityHandler
     */
    public function setEntityHandler(UserEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    /**
     * @param array $params
     * @return array
     */
    public function getFilterDatas(array $params): array
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
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws Exception
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function form(Request $request, User $user = null)
    {
        $params = [
            'formView' => 'Security/userForm.html.twig',
            'formRoute' => 'sec_user_form',
            'formPageTitle' => 'Usuário',
            'typeClass' => UserType::class
        ];
        return $this->doForm($request, $user, $params);
    }

    /**
     *
     * @Route("/sec/user/list/", name="sec_user_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws Exception
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function list(Request $request): Response
    {
        $params = [
            'listView' => 'Security/userList.html.twig',
            'listRoute' => 'sec_user_list',
            'listRouteAjax' => 'sec_user_datatablesJsList',
            'listPageTitle' => 'Usuários do Sistema',
            'listId' => 'userList',
            'formRoute' => 'sec_user_form'
        ];
        return $this->doList($request, $params);
    }

    /**
     *
     * @Route("/sec/user/datatablesJsList/", name="sec_user_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws ViewException
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function datatablesJsList(Request $request): Response
    {
        return $this->doDatatablesJsList($request);
    }


}
