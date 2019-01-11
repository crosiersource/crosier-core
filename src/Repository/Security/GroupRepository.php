<?php

namespace App\Repository\Security;

use App\Entity\Security\Group;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * RepositoryUtils para a entidade Group.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class GroupRepository extends FilterRepository
{

    public function getEntityClass()
    {
        return Group::class;
    }
}
