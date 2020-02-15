<?php

namespace App\Controller\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Security\UserEntityHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller\Security
 * @author Carlos Eduardo Pauluk
 */
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
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     *
     */
    public function login(AuthenticationUtils $authenticationUtils)
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
    public function logout(): void
    {
        // não precisa
    }


    /**
     *
     * @Route("/sec/hash", name="hash")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function hash(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $params = $request->query->all();

        $raw = array_key_exists('raw', $params) ? $params['raw'] : "";

        // whatever *your* User object is
        $user = new User();
        $encoded = $encoder->encodePassword($user, $raw);

        return new Response($encoded);
    }
}

