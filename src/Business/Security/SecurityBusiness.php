<?php

namespace App\Business\Security;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class SecurityBusiness.
 *
 * @author Carlos Eduardo Pauluk
 */
class SecurityBusiness
{

    private $doctrine;

    private $authChecker;

    public function __construct(EntityManagerInterface $doctrine, AuthorizationCheckerInterface $authChecker)
    {
        $this->doctrine = $doctrine;
        $this->authChecker = $authChecker;
    }


}