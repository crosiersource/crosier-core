<?php

namespace App\Repository\Security;

use App\Entity\Security\User;
use App\Repository\FilterRepository;

/**
 * RepositoryUtils para a entidade User.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class UserRepository extends FilterRepository
{

    public function getEntityClass()
    {
        return User::class;
    }
}
