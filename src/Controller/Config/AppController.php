<?php

namespace App\Controller\Config;

use App\Form\Config\AppType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\App;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\AppConfig;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Config\AppConfigEntityHandler;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Config\AppEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Repository\Config\AppConfigRepository;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AppController.
 *
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class AppController extends FormListController
{

    /**
     * @Route("/config/app/form", name="config_app_form")
     */
    public function form(): Response
    {
        $params = [
            'jsEntry' => 'Config/App/app_form'
        ];
        return $this->doRender('@CrosierLibBase/vue-app-page.html.twig', $params);
    }

    /**
     * @Route("/config/app/list", name="config_app_list")
     */
    public function list(): Response
    {
        $params = [
            'jsEntry' => 'Config/App/app_list'
        ];
        return $this->doRender('@CrosierLibBase/vue-app-page.html.twig', $params);
    }

}