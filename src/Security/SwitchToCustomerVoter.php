<?php

namespace App\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class SwitchToCustomerVoter extends Voter
{
    /** @required */
    public Security $security;

    protected function supports($attribute, $subject): bool
    {
        return in_array($attribute, ['CAN_SWITCH_USER'])
            && $subject instanceof UserInterface;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        /** @var User $user */
        $user = $token->getUser();
        // if the user is anonymous or if the subject is not a user, do not grant access
        if (!$user instanceof UserInterface || !$subject instanceof UserInterface) {
            return false;
        }

        // you can still check for ROLE_ALLOWED_TO_SWITCH
        if ($this->security->isGranted('ROLE_ADMIN') &&
            $this->security->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            return true;
        }

        // check for any roles you want
        if ($this->security->isGranted('ROLE_ALLOWED_TO_SWITCH_IF_SAME_EMAIL')) {
            /** @var User $loggedUser */
            $loggedUser = $this->security->getUser();
            if ($user->email === $loggedUser->email) {
                return true;
            }
        }

        return false;
    }
}