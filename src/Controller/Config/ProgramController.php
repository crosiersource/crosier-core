<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\Config\ProgramEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Repository\Config\ProgramRepository;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProgramController.
 *
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class ProgramController extends FormListController
{


    /**
     * @required
     * @param ProgramEntityHandler $entityHandler
     */
    public function setEntityHandler(ProgramEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData('descricao', 'LIKE', 'descricao', $params),
            new FilterData('a.nome', 'LIKE', 'app', $params)
        ];
    }

    /**
     *
     * @Route("/cfg/program/form/{id}", name="cfg_program_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Program|null $program
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function form(Request $request, Program $program = null)
    {
        $params = [
            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'cfg_program_form',
            'formPageTitle' => 'Programa'
        ];
        return $this->doForm($request, $program, $params);
    }

    /**
     *
     * @Route("/cfg/program/list/", name="cfg_program_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function list(Request $request): Response
    {
        $params = [
            'listView' => 'Config/programList.html.twig',
            'listRoute' => 'cfg_program_list',
            'listRouteAjax' => 'cfg_program_datatablesJsList',
            'listPageTitle' => 'Programas',
            'listId' => 'programList'
        ];
        return $this->doList($request, $params);
    }

    /**
     *
     * @Route("/cfg/program/datatablesJsList/", name="cfg_program_datatablesJsList")
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
     * @param array $dados
     */
    public function handleDadosList(array &$dados): void
    {
        /** @var ProgramRepository $programRepo */
        $programRepo = $this->getDoctrine()->getRepository(Program::class);
        $programRepo->buildTransientsInAll($dados);
    }


    /**
     *
     * @Route("/cfg/program/delete/{id}/", name="cfg_program_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Program $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @IsGranted({"ROLE_ADMIN"}, statusCode=403)
     */
    public function delete(Request $request, Program $id): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $id, ['listRoute' => 'cfg_program_list']);
    }


}