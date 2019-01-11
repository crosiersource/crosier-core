<?php

namespace App\Repository\Security;

use App\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

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
