<?php

namespace App\EntityHandler\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\Role;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 * Class RoleEntityHandler
 * @package App\EntityHandler\Security
 * @author Carlos Eduardo Pauluk
 */
class RoleEntityHandler extends EntityHandler
{

    public function getEntityClass()
    {
        return Role::class;
    }
}