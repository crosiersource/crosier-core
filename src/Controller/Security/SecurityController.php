<?php

namespace App\Controller\Security;

use App\Entity\Config\Modulo;
use App\EntityHandler\Security\UserEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @var UserEntityHandler
     */
    private $userEntityHandler;

    public function __construct(UserEntityHandler $userEntityHandler)
    {

        $this->userEntityHandler = $userEntityHandler;
    }

    /**
     *
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('Security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error
        ));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        // não precisa
    }

    /**
     * @Route("/reauthApps/{app}", name="reauth_apps")
     */
    public function reauthApps(Request $request, Modulo $app)
    {
        $token = $this->userEntityHandler->renewTokenApi($this->getUser());
        $url = $app->getEntranceUrl() . '?apiTokenAuthorization=' . $token;
        return new RedirectResponse($url);
    }


    /**
     *
     * @Route("/sec/hash", name="hash")
     */
    public function hash(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $params = $request->query->all();

        $raw = array_key_exists('raw', $params) ? $params['raw'] : "";

        // whatever *your* User object is
        $user = new User();
        $encoded = $encoder->encodePassword($user, $raw);

        return new Response($encoded);
    }
}

