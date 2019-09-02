<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\Config;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Config\ConfigEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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

    /**
     * @required
     * @param ConfigEntityHandler $entityHandler
     */
    public function setEntityHandler(ConfigEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['chave', 'valor'], 'LIKE', 'descricao', $params)
        ];
    }

    /**
     *
     * @Route("/cfg/config/form/{id}", name="cfg_config_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Config|null $config
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function form(Request $request, Config $config = null)
    {
        $params = [
            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'cfg_config_form',
            'formPageTitle' => 'Parâmetro de Configuração',
        ];
        return $this->doForm($request, $config, $params);
    }

    /**
     *
     * @Route("/cfg/config/list/", name="cfg_config_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function list(Request $request): Response
    {
        $params = [
            'listView' => 'Config/configList.html.twig',
            'listRoute' => 'cfg_config_list',
            'listRouteAjax' => 'cfg_config_datatablesJsList',
            'listPageTitle' => 'Parâmetros de Configuração',
            'listId' => 'configList'
        ];
        return $this->doList($request);
    }

    /**
     *
     * @Route("/cfg/config/datatablesJsList/", name="cfg_config_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function datatablesJsList(Request $request): Response
    {
        return $this->doDatatablesJsList($request);
    }

    /**
     *
     * @Route("/cfg/config/delete/{id}/", name="cfg_config_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Config $config
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function delete(Request $request, Config $config): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $config);
    }

    /**
     *
     * @Route("/cfg/config/select2json", name="cfg_config_select2json")
     * @return Response
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function configSelect2json(): Response
    {
        $itens = $this->getDoctrine()->getRepository(Config::class)->findBy(['concreta' => true], ['codigo' => 'ASC']);

        $rs = array();
        /** @var Config $item */
        foreach ($itens as $item) {
            $r['id'] = $item->getId();
            $r['text'] = $item->getChave();
            $rs[] = $r;
        }

        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));
        $json = $serializer->serialize($rs, 'json');

        return new Response($json);
    }


}