<?php

namespace App\EventSubscriber;


use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Security\UserEntityHandler;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;

/**
 * Class LoginSubscriber.
 *
 * Como um crosierapp pode estar sendo usado sem que o usuário acesse o crosier-core, eventualmente o apiToken irá
 * expirar. Temos aqui um monitor que verifica se o token já está a 1 dia sendo utilizado, ele é automaticamente
 * renovado.
 * Caso este monitoramento não seja realizado, pode acontecer do usuário ser automaticamente deslogado enquanto está
 * em plena operação de um crosierapp.
 *
 * @author Carlos Eduardo Pauluk
 */
class LoginSubscriber implements EventSubscriberInterface
{

    private LoggerInterface $logger;

    private UserEntityHandler $userEntityHandler;

    public function __construct(LoggerInterface $logger, UserEntityHandler $userEntityHandler)
    {
        $this->logger = $logger;
        $this->userEntityHandler = $userEntityHandler;
    }

    /**
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            SecurityEvents::INTERACTIVE_LOGIN => [
                ['onLogin', 0],
            ]
        ];
    }

    public function onLogin(InteractiveLoginEvent $event)
    {
        $this->logger->info('InteractiveLoginEvent');
        try {
            /** @var User $user */
            $user = $event->getAuthenticationToken()->getUser();
            // Se for expirar dentro de 2 semanas, já renova.
            if ($user->apiTokenExpiresAt < new \DateTime('+336 hour')) {
                $this->logger->info('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Renovando o apiToken');
                $this->userEntityHandler->renewTokenApi($user);
            }
        } catch (\Exception $e) {
            $this->logger->error('Erro ao renewTokenApi()');
            $this->logger->error($e->getMessage());
        }
    }
}