<?php

namespace App\Business\Security;


use App\Entity\Config\App;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class SecurityBusiness.
 *
 * @author Carlos Eduardo Pauluk
 */
class SecurityBusiness
{

    private $doctrine;

    private $authChecker;

    public function __construct(RegistryInterface $doctrine, AuthorizationCheckerInterface $authChecker)
    {
        $this->doctrine = $doctrine;
        $this->authChecker = $authChecker;
    }

    /**
     * @param Controller $controller
     * @param $appDesc
     * @throws \Exception
     */
    public function checkAccess($appDesc)
    {
        $app = $this->doctrine->getRepository(App::class)->findOneby(['route' => $appDesc]);
        if (!$app) {
            throw new \Exception('App não encontrado: [' . $appDesc . ']');
        }
        if (!$app->getRoles() or $app->getRoles()->count() < 1) {
            throw new \Exception('App sem roles definidas: [' . $appDesc . ']');
        }
        if (!$this->authChecker->isGranted($app->getRolesArray())) {
            throw new AccessDeniedException();
        }

    }

}