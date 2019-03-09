<?php

namespace App\Controller\Config;

use App\Entity\Config\Program;
use App\EntityHandler\Config\ProgramEntityHandler;
use App\Form\Config\ProgramType;
use App\Repository\Config\ProgramRepository;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
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

    protected $crudParams =
        [
            'typeClass' => ProgramType::class,
            'formView' => 'Config/programForm.html.twig',
            'formRoute' => 'cfg_program_form',
            'formPageTitle' => 'Programa',
            'listView' => 'Config/programList.html.twig',
            'listRoute' => 'cfg_program_list',
            'listRouteAjax' => 'cfg_program_datatablesJsList',
            'listPageTitle' => 'Programas',
            'listId' => 'programList',
            'normalizedAttrib' => [
                'id',
                'descricao',
                'UUID',
                'url',
                'app' => ['nome']
            ],

        ];

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
            new FilterData('descricao', 'LIKE', 'descricao', 'string', $params),
            new FilterData('a.nome', 'LIKE', 'app', 'string', $params)
        ];
    }

    /**
     *
     * @Route("/cfg/program/form/{id}", name="cfg_program_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Program|null $program
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, Program $program = null)
    {
        return $this->doForm($request, $program);
    }

    /**
     *
     * @Route("/cfg/program/list/", name="cfg_program_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function list(Request $request): Response
    {
        return $this->doList($request);
    }

    /**
     *
     * @Route("/cfg/program/datatablesJsList/", name="cfg_program_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     */
    public function datatablesJsList(Request $request): Response
    {
        return $this->doDatatablesJsList($request);
    }

    public function handleDadosList(array &$dados)
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
     */
    public function delete(Request $request, Program $id): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $id);
    }


}