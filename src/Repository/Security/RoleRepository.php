<?php

namespace App\Repository\Security;

use App\Entity\Security\Role;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * RepositoryUtils para a entidade Role.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class RoleRepository extends FilterRepository
{

    public function getEntityClass()
    {
        return Role::class;
    }
}
