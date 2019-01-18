<?php

namespace App\EntityHandler\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserEntityHandler
 * @package App\EntityHandler\Security
 * @author Carlos Eduardo Pauluk
 */
class UserEntityHandler extends EntityHandler
{

    private $encoder;

    /**
     * @return mixed
     */
    public function getEncoder()
    {
        return $this->encoder;
    }

    /**
     * @required
     * @param mixed $encoder
     */
    public function setEncoder(UserPasswordEncoderInterface $encoder): void
    {
        $this->encoder = $encoder;
    }


    public function beforeSave($user)
    {
        // $encoded = $this->encoder->encodePassword($user,$user->getPassword());
        // $user->setPassword($encoded);
    }

    /**
     * @param User $user
     * @return mixed
     * @throws \Exception
     */
    public function renewTokenApi(User $user) {
        if (!$user->getApiToken() || $user->getApiTokenExpiresAt() <= new \DateTime()) {
            $user->setApiToken(bin2hex(random_bytes(60)));
            $user->setApiTokenExpiresAt(new \DateTime('+48 hour'));
            $this->save($user);
        }
        return $user->getApiToken();
    }


    public function getEntityClass()
    {
        return User::class;
    }
}