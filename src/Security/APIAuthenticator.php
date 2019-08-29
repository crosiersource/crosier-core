<?php

namespace App\Security;

use CrosierSource\CrosierLibBaseBundle\Security\APIAuthenticatorTrait;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

/**
 * Autenticação por API Token.
 *
 * @author Carlos Eduardo Pauluk
 */
class APIAuthenticator extends AbstractGuardAuthenticator
{

    use APIAuthenticatorTrait;

}
