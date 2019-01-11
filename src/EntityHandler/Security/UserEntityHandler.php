<?php

namespace App\EntityHandler\Security;

use App\Entity\Security\User;
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
        $encoded = $this->encoder->encodePassword($user,$user->getPassword());
        $user->setPassword($encoded);
    }


    public function getEntityClass()
    {
        return User::class;
    }
}