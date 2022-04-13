<?php

namespace App\Controller\Security;

use CrosierSource\CrosierLibBaseBundle\Business\Config\SyslogBusiness;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Security\UserEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\CrosierApiResponse;
use CrosierSource\CrosierLibBaseBundle\Utils\DateTimeUtils\DateTimeUtils;
use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\StringUtils;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Mailjet\Resources;
use Postmark\PostmarkClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\RateLimiter\RateLimiterFactory;
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

    private UserEntityHandler $userEntityHandler;


    private RateLimiterFactory $anonymousApiLimiter;


    public function __construct(UserEntityHandler  $userEntityHandler,
                                RateLimiterFactory $anonymousApiLimiter,
                                SyslogBusiness     $syslog)
    {
        $this->userEntityHandler = $userEntityHandler;
        $this->anonymousApiLimiter = $anonymousApiLimiter;
        $this->syslog = $syslog->setApp('core')->setComponent(self::class);
    }

    /**
     *
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     *
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $this->checkRateLimit($request);
        $error = $authenticationUtils->getLastAuthenticationError();
        $username = $request->get('username') ?? $authenticationUtils->getLastUsername();
        return $this->render('Security/login.html.twig', array(
            'username' => $username,
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


    private function checkRateLimit(Request $request): void
    {
        if (false === $this->anonymousApiLimiter->create($request->getClientIp())->consume(1)->isAccepted()) {
            throw new TooManyRequestsHttpException();
        }
    }


    /**
     * @Route("/sec/user/recuperaSenha/ini", methods={"GET","HEAD"}, name="sec_user_recuperaSenha_ini")
     */
    public function recuperaSenhaIni(Request $request): Response
    {
        $this->checkRateLimit($request);
        return $this->render('@CrosierLibBase/vue-app-page-semmenu.html.twig', [
            'serverParams' => json_encode([
                'crosierLogo' => $_SERVER['CROSIER_LOGO'],
            ]),
            'jsEntry' => 'sec/user/confirmUser',
        ]);
    }

    /**
     * @Route("/api/sec/user/recuperaSenha/confirmarUser", methods={"POST","HEAD"}, name="api_sec_user_recuperaSenha_confirmarUser")
     */
    public function confirmarUser(Request $request): JsonResponse
    {
        $this->checkRateLimit($request);

        $params = json_decode($request->getContent(), true);

        if (!$params['confirmUser']) {
            throw new BadRequestHttpException();
        }

        /** @var Connection $conn */
        $conn = $this->getDoctrine()->getConnection();

        try {
            $str = $params['confirmUser'];

            $rs = $conn->fetchAssociative('SELECT id FROM sec_user WHERE ativo = true AND (username = :str OR email = :str OR fone = :str)',
                ['str' => $str]);

            if ($rs['id'] ?? false) {
                $repoUser = $this->getDoctrine()->getRepository(User::class);
                $user = $repoUser->find($rs['id']);
                $user->tokenRecupSenha = StringUtils::guidv4();
                $user->dtValidadeTokenRecupSenha = DateTimeUtils::addMinutes(null, 15);
                $this->userEntityHandler->save($user);

                $primeiroNome = explode(' ', $user->nome)[0];
                $primeiroNome = ucfirst(strtolower($primeiroNome));

                $link = $_SERVER['CROSIERCORE_URL'] . '/sec/user/recuperaSenha/confirmaLink?token=' . $user->tokenRecupSenha . '&id=' . $user->getId();

                $html = $this->renderView('Security/emailConfirmaAtivacao.html.twig',
                    ['link' => $link, 'email' => $user->email, 'primeiroNome' => $primeiroNome]);
                
                $client = new PostmarkClient($_SERVER['PM_TOKEN']);
                $client->sendEmail('mailer@crosier.com.br', $user->email, 'Recuperação de senha', $html);
            }
            return CrosierApiResponse::success();
        } catch (\Exception $e) {
            if ($conn->isTransactionActive()) {
                try {
                    $conn->rollBack();
                } catch (Exception $e) {
                    //...
                }
            }
            throw new BadRequestHttpException();
        }
    }


    /**
     * @Route("/sec/user/recuperaSenha/confirmaLink", methods={"GET","HEAD"}, name="sec_user_recuperaSenha_confirmaLink")
     */
    public function confirmaLink(Request $request): Response
    {
        $this->checkRateLimit($request);

        $token = $request->get('token');

        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repoUser->findOneByTokenRecupSenha($token);

        if (!$user || !$user->dtValidadeTokenRecupSenha) {
            return $this->render('erro.html.twig', ['msg' => 'Token inválido.']);
        }

        if (DateTimeUtils::diffInMinutes(new \DateTime(), $user->dtValidadeTokenRecupSenha) > 15) {
            return $this->render('erro.html.twig', ['msg' => 'Token expirado.']);
        }

        return $this->render('@CrosierLibBase/vue-app-page-semmenu.html.twig', [
            'serverParams' => json_encode([
                'crosierLogo' => $_SERVER['CROSIER_LOGO'],
                'token' => $token,
                'id' => $user->getId(),
            ]),
            'jsEntry' => 'sec/user/setPassword',
        ]);
    }


    /**
     * @Route("/sec/user/recuperaSenha/setPassword", name="sec_user_recuperaSenha_setPassword")
     */
    public function setPassword(Request $request): Response
    {
        $this->checkRateLimit($request);

        try {
            $content = json_decode($request->getContent(), true);
            $token = $content['token'];
            $id = $content['userId'];
            $password = $content['password'];
            $password2 = $content['password2'];

            if (!$token) {
                return $this->render('erro.html.twig', ['erro' => 'Erro!', 'mensagem' => 'Token inválido.']);
            }

            if ($password !== $password2) {
                return $this->render('erro.html.twig', ['erro' => 'Erro!', 'mensagem' => 'As senhas não coincidem.']);
            }

            /** @var Connection $conn */
            $conn = $this->getDoctrine()->getConnection();

            $rs = $conn->fetchAssociative('SELECT id FROM sec_user WHERE ativo AND token_recupsenha = :token AND id = :id',
                ['token' => $token, 'id' => $id]);
            if (!$rs) {
                return CrosierApiResponse::error();
            }

            $repoUser = $this->getDoctrine()->getRepository(User::class);
            $user = $repoUser->find($id);

            $user->password = $password;
            $user->tokenRecupSenha = null;
            $user->dtValidadeTokenRecupSenha = null;

            $this->userEntityHandler->save($user);

            return CrosierApiResponse::success(['username' => $user->username]);
        } catch (\Exception $e) {
            $this->syslog->err('Erro ao alterar a senha.');
        }
        return CrosierApiResponse::error();

    }


    /**
     * @Route("/sec/user/testEmailAtivacao", name="aprogressiva_testEmailAtivacao")
     */
    public function testEmailAtivacao(): Response
    {
        return $this->render('Security/emailConfirmaAtivacao.html.twig', ['email' => 'carlospauluk@gmail.com', 'link' => 'https://www.google.com/']);
    }


}

