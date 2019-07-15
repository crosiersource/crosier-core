<?php

namespace App\Security;


use App\EntityHandler\Security\UserEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Exception\ViewException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class LogoutHandler implements LogoutSuccessHandlerInterface
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var UserEntityHandler
     */
    private $userEntityHandler;
    /**
     * @var Security
     */
    private $security;

    /** @var SessionInterface */
    private $session;


    public function __construct(LoggerInterface $logger,
                                UserEntityHandler $userEntityHandler,
                                Security $security,
                                SessionInterface $session)
    {
        $this->logger = $logger;
        $this->userEntityHandler = $userEntityHandler;
        $this->security = $security;
        $this->session = $session;
    }


    /**
     * Creates a Response object to send upon a successful logout.
     *
     * @return RedirectResponse
     */
    public function onLogoutSuccess(Request $request)
    {
        try {
            if ($this->security->getUser()) {
                $this->userEntityHandler->revogarApiToken($this->security->getUser());
            }

            if ($this->session->has('programs_menus')) {
                $this->session->set('programs_menus', null);
            }
            if ($this->session->has('crosier_menus')) {
                $this->session->set('crosier_menus', null);
            }
        } catch (ViewException $e) {
            $this->logger->error('Erro ao revogar apitoken');
            $this->logger->error($e->getMessage());
        }
        return new RedirectResponse('/');
    }
}