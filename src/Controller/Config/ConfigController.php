<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use App\Entity\Config\Config;
use App\EntityHandler\Config\ConfigEntityHandler;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;
use App\Form\Config\ConfigType;
use App\Utils\Repository\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class ConfigController.
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class ConfigController extends FormListController
{

    private $entityHandler;

    public function __construct(ConfigEntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    public function getEntityHandler(): ?EntityHandler
    {
        return $this->entityHandler;
    }

    public function getFormRoute()
    {
        return 'cfg_config_form';
    }

    public function getFormView()
    {
        return 'Config/configForm.html.twig';
    }

    public function getFilterDatas($params)
    {
        return array(
            new FilterData(['chave','valor'], 'LIKE', $params['filter']['descricao'])
        );
    }

    public function getListView()
    {
        return 'Config/configList.html.twig';
    }

    public function getListRoute()
    {
        return 'cfg_config_list';
    }


    public function getTypeClass()
    {
        return ConfigType::class;
    }

    /**
     *
     * @Route("/cfg/config/form/{id}", name="cfg_config_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Config|null $config
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function form(Request $request, Config $config = null)
    {
        return $this->doForm($request, $config);
    }

    /**
     *
     * @Route("/cfg/config/list/", name="cfg_config_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(Request $request)
    {
        return $this->doList($request);
    }

    /**
     * @return array|mixed
     */
    public function getNormalizeAttributes()
    {
        return array(
            'attributes' => array(
                'id',
                'chave',
                'valor',
                'global'
            )
        );
    }

    /**
     *
     * @Route("/cfg/config/datatablesJsList/", name="cfg_config_datatablesJsList")
     * @param Request $request
     * @return Response
     */
    public function datatablesJsList(Request $request)
    {
        $jsonResponse = $this->doDatatablesJsList($request);
        return $jsonResponse;
    }

    /**
     *
     * @Route("/cfg/config/delete/{id}/", name="cfg_config_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Config $config
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Config $config)
    {
        return $this->doDelete($request, $config);
    }

    /**
     *
     * @Route("/cfg/config/select2json", name="cfg_config_select2json")
     * @param Request $request
     * @return Response
     */
    public function configSelect2json(Request $request)
    {
        $itens = $this->getDoctrine()->getRepository(Config::class)->findBy(['concreta' => true], ['codigo' => 'ASC']);

        $rs = array();
        foreach ($itens as $item) {
            $r['id'] = $item->getId();
            $r['text'] = $item->getDescricaoMontada();
            $rs[] = $r;
        }

        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));
        $json = $serializer->serialize($rs, 'json');

        return new Response($json);
    }


}