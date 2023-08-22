<?php

namespace App\Controller\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Security\UserEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Exception\ViewException;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\CrosierApiResponse;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Carlos Eduardo Pauluk
 */
class UserController extends AbstractController
{

    /** @required */
    public EntityManagerInterface $doctrine;

    /**
     * @Route("/api/sec/user/listUsersFromSameUserEmail", name="api_sec_user_listUsersFromSameUserEmail", requirements={"email"="\w+"})
     */
    public function listUsersFromSameUserEmail(Request $request): JsonResponse
    {
        try {
            $email = $request->get('email');
            $repoUser = $this->doctrine->getRepository(User::class);
            $rs = $repoUser->getUsersByEmail($email);
            $users = [];
            /** @var User $user */
            foreach ($rs as $user) {
                $users[] = [
                    'id' => $user->getId(),
                    'username' => $user->username,
                    'descricao' => $user->descricao,
                    'descricaoMontada' => $user->getDescricaoMontada(),
                    'email' => $user->email,
                    'nome' => $user->nome,
                    'fone' => $user->fone,
                    'ativo' => $user->isActive,
                ];
            }
            return CrosierApiResponse::success($users);
        } catch (\Exception $e) {
            return CrosierApiResponse::error($e, true);
        }
    }

    /**
     * @Route("/api/sec/user/tryToDeleteAll", name="api_sec_user_tryToDeleteAll")
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function tryToDeleteAll(UserEntityHandler $userEntityHandler): JsonResponse
    {
        try {
            $repoUser = $this->doctrine->getRepository(User::class);
            $rs = $repoUser->findAll();
            foreach ($rs as $user) {
                try {
                    $this->doctrine->getConnection()->delete('sec_user', ['id' => $user->getId()]);
                    $msgs[] = 'Usuário ' . $user->getDescricaoMontada() . ' (' . $user->getId() . ') deletado com sucesso';
                } catch (\Exception $e) {
                    $msgs[] = 'Não foi possível deletar o usuário ' . $user->getDescricaoMontada() . ' (' . $user->getId() . ') pois: ' . $e->getMessage();
                }
            }
            return CrosierApiResponse::success($msgs);
        } catch (\Exception $e) {
            return CrosierApiResponse::error($e, true);
        }
        
    }


}
