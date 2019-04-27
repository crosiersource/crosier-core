<?php

namespace App\Controller\Base;

use App\Entity\Base\Prop;
use App\EntityHandler\Base\PropEntityHandler;
use App\Form\Base\PropType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PropController.
 * @package App\Controller\Base
 * @author Carlos Eduardo Pauluk
 */
class PropController extends FormListController
{

    protected $crudParams =
        [
            'typeClass' => PropType::class,

            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'bse_prop_form',
            'formPageTitle' => 'Propriedades',
            'form_PROGRAM_UUID' => '',

            'listView' => '@CrosierLibBase/list.html.twig',
            'listRoute' => 'bse_prop_list',
            'listRouteAjax' => 'bse_prop_datatablesJsList',
            'listPageTitle' => 'Propriedades',
            'listId' => 'propList',
            'list_PROGRAM_UUID' => '',
            'listJS' => 'bse/propList.js',

        ];

    /**
     * @required
     * @param PropEntityHandler $entityHandler
     */
    public function setEntityHandler(PropEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['nome'], 'LIKE', 'str', $params)
        ];
    }

    /**
     *
     * @Route("/bse/prop/form/{id}", name="bse_prop_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Prop|null $prop
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, Prop $prop = null)
    {
        return $this->doForm($request, $prop);
    }

    /**
     *
     * @Route("/bse/prop/list/", name="bse_prop_list")
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
     * @Route("/bse/prop/datatablesJsList/", name="bse_prop_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     */
    public function datatablesJsList(Request $request): Response
    {
        return $this->doDatatablesJsList($request);
    }

    /**
     *
     * @Route("/bse/prop/delete/{id}/", name="bse_prop_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Prop $prop
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Prop $prop): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $prop);
    }


    private function p($gradeId, $val, &$arr)
    {

        $achou = false;
        foreach ($arr as &$e) {
            if ($e['gradeId'] === $gradeId) {
                $e['tamanhos'][] = $val;
                $achou = true;
                break;
            }
        }
        if (!$achou) {
            $arr[] = ['gradeId' => $gradeId, 'tamanhos' => [$val]];
        }

    }

    /**
     *
     * @Route("/bse/prop/buildJson/", name="bse_prop_buildJson")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function buildJson(): Response
    {
        $arr[] = ['gradeId' => 1, 'tamanhos' => [['id' => 1, 'ordem' => 1, 'posicao' => 8, 'tamanho' => 'PP']]];
        $this->p(1, ['id' => 2, 'ordem' => 2, 'posicao' => 9, 'tamanho' => 'P'], $arr);
        $this->p(1, ['id' => 3, 'ordem' => 3, 'posicao' => 10, 'tamanho' => 'M'], $arr);
        $this->p(1, ['id' => 4, 'ordem' => 4, 'posicao' => 11, 'tamanho' => 'G'], $arr);
        $this->p(1, ['id' => 5, 'ordem' => 5, 'posicao' => 12, 'tamanho' => 'XG'], $arr);
        $this->p(1, ['id' => 6, 'ordem' => 6, 'posicao' => 13, 'tamanho' => 'SG'], $arr);
        $this->p(1, ['id' => 7, 'ordem' => 7, 'posicao' => 14, 'tamanho' => 'SS'], $arr);
        $this->p(2, ['id' => 8, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '0'], $arr);
        $this->p(2, ['id' => 9, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '1'], $arr);
        $this->p(2, ['id' => 10, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '2'], $arr);
        $this->p(2, ['id' => 11, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '3'], $arr);
        $this->p(2, ['id' => 12, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '4'], $arr);
        $this->p(2, ['id' => 13, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '5'], $arr);
        $this->p(2, ['id' => 14, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '6'], $arr);
        $this->p(2, ['id' => 15, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '7'], $arr);
        $this->p(2, ['id' => 16, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '8'], $arr);
        $this->p(2, ['id' => 17, 'ordem' => 10, 'posicao' => 10, 'tamanho' => '9'], $arr);
        $this->p(3, ['id' => 18, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '00'], $arr);
        $this->p(3, ['id' => 19, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '01'], $arr);
        $this->p(3, ['id' => 20, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '02'], $arr);
        $this->p(3, ['id' => 21, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '03'], $arr);
        $this->p(3, ['id' => 22, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '04'], $arr);
        $this->p(3, ['id' => 23, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '06'], $arr);
        $this->p(3, ['id' => 24, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '08'], $arr);
        $this->p(3, ['id' => 25, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '10'], $arr);
        $this->p(3, ['id' => 26, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '12'], $arr);
        $this->p(3, ['id' => 27, 'ordem' => 10, 'posicao' => 10, 'tamanho' => '14'], $arr);
        $this->p(3, ['id' => 28, 'ordem' => 11, 'posicao' => 11, 'tamanho' => '16'], $arr);
        $this->p(3, ['id' => 29, 'ordem' => 12, 'posicao' => 12, 'tamanho' => '18'], $arr);
        $this->p(4, ['id' => 30, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '34'], $arr);
        $this->p(4, ['id' => 31, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '36'], $arr);
        $this->p(4, ['id' => 32, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '38'], $arr);
        $this->p(4, ['id' => 33, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '40'], $arr);
        $this->p(4, ['id' => 34, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '42'], $arr);
        $this->p(4, ['id' => 35, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '44'], $arr);
        $this->p(4, ['id' => 36, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '46'], $arr);
        $this->p(4, ['id' => 37, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '48'], $arr);
        $this->p(4, ['id' => 38, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '50'], $arr);
        $this->p(4, ['id' => 39, 'ordem' => 10, 'posicao' => 10, 'tamanho' => '52'], $arr);
        $this->p(4, ['id' => 40, 'ordem' => 11, 'posicao' => 11, 'tamanho' => '54'], $arr);
        $this->p(4, ['id' => 41, 'ordem' => 12, 'posicao' => 12, 'tamanho' => '56'], $arr);
        $this->p(5, ['id' => 42, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '17'], $arr);
        $this->p(5, ['id' => 43, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '18'], $arr);
        $this->p(5, ['id' => 44, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '19'], $arr);
        $this->p(5, ['id' => 45, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '20'], $arr);
        $this->p(5, ['id' => 46, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '21'], $arr);
        $this->p(5, ['id' => 47, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '22'], $arr);
        $this->p(5, ['id' => 48, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '23'], $arr);
        $this->p(5, ['id' => 49, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '24'], $arr);
        $this->p(5, ['id' => 50, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '25'], $arr);
        $this->p(5, ['id' => 51, 'ordem' => 10, 'posicao' => 10, 'tamanho' => '26'], $arr);
        $this->p(5, ['id' => 52, 'ordem' => 11, 'posicao' => 11, 'tamanho' => '27'], $arr);
        $this->p(5, ['id' => 53, 'ordem' => 12, 'posicao' => 12, 'tamanho' => '28'], $arr);
        $this->p(6, ['id' => 54, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '23'], $arr);
        $this->p(6, ['id' => 55, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '24'], $arr);
        $this->p(6, ['id' => 56, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '25'], $arr);
        $this->p(6, ['id' => 57, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '26'], $arr);
        $this->p(6, ['id' => 58, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '27'], $arr);
        $this->p(6, ['id' => 59, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '28'], $arr);
        $this->p(6, ['id' => 60, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '29'], $arr);
        $this->p(6, ['id' => 61, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '30'], $arr);
        $this->p(6, ['id' => 62, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '31'], $arr);
        $this->p(6, ['id' => 63, 'ordem' => 10, 'posicao' => 10, 'tamanho' => '32'], $arr);
        $this->p(6, ['id' => 64, 'ordem' => 11, 'posicao' => 11, 'tamanho' => '33'], $arr);
        $this->p(6, ['id' => 65, 'ordem' => 12, 'posicao' => 12, 'tamanho' => '34'], $arr);
        $this->p(7, ['id' => 66, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '33'], $arr);
        $this->p(7, ['id' => 67, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '34'], $arr);
        $this->p(7, ['id' => 68, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '35'], $arr);
        $this->p(7, ['id' => 69, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '36'], $arr);
        $this->p(7, ['id' => 70, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '37'], $arr);
        $this->p(7, ['id' => 71, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '38'], $arr);
        $this->p(7, ['id' => 72, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '39'], $arr);
        $this->p(7, ['id' => 73, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '40'], $arr);
        $this->p(7, ['id' => 74, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '41'], $arr);
        $this->p(7, ['id' => 75, 'ordem' => 10, 'posicao' => 10, 'tamanho' => '42'], $arr);
        $this->p(7, ['id' => 76, 'ordem' => 11, 'posicao' => 11, 'tamanho' => '43'], $arr);
        $this->p(7, ['id' => 77, 'ordem' => 12, 'posicao' => 12, 'tamanho' => '44'], $arr);
        $this->p(8, ['id' => 78, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '10'], $arr);
        $this->p(8, ['id' => 79, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '11'], $arr);
        $this->p(8, ['id' => 80, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '12'], $arr);
        $this->p(8, ['id' => 81, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '13'], $arr);
        $this->p(8, ['id' => 82, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '14'], $arr);
        $this->p(8, ['id' => 83, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '15'], $arr);
        $this->p(8, ['id' => 84, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '16'], $arr);
        $this->p(8, ['id' => 85, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '17'], $arr);
        $this->p(8, ['id' => 86, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '18'], $arr);
        $this->p(8, ['id' => 87, 'ordem' => 10, 'posicao' => 10, 'tamanho' => '19'], $arr);
        $this->p(8, ['id' => 88, 'ordem' => 11, 'posicao' => 11, 'tamanho' => '20'], $arr);
        $this->p(8, ['id' => 89, 'ordem' => 12, 'posicao' => 12, 'tamanho' => '21'], $arr);
        $this->p(9, ['id' => 90, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '15'], $arr);
        $this->p(9, ['id' => 91, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '16'], $arr);
        $this->p(9, ['id' => 92, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '17'], $arr);
        $this->p(9, ['id' => 93, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '18'], $arr);
        $this->p(9, ['id' => 94, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '19'], $arr);
        $this->p(9, ['id' => 95, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '20'], $arr);
        $this->p(9, ['id' => 96, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '21'], $arr);
        $this->p(9, ['id' => 97, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '22'], $arr);
        $this->p(9, ['id' => 132, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '24'], $arr);
        $this->p(10, ['id' => 98, 'ordem' => 1, 'posicao' => 1, 'tamanho' => 'MT'], $arr);
        $this->p(11, ['id' => 99, 'ordem' => 1, 'posicao' => 1, 'tamanho' => 'UN'], $arr);
        $this->p(12, ['id' => 100, 'ordem' => 1, 'posicao' => 1, 'tamanho' => 'KG'], $arr);
        $this->p(13, ['id' => 101, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '48'], $arr);
        $this->p(13, ['id' => 102, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '50'], $arr);
        $this->p(13, ['id' => 103, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '52'], $arr);
        $this->p(13, ['id' => 104, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '54'], $arr);
        $this->p(13, ['id' => 105, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '56'], $arr);
        $this->p(13, ['id' => 106, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '58'], $arr);
        $this->p(13, ['id' => 107, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '60'], $arr);
        $this->p(13, ['id' => 108, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '62'], $arr);
        $this->p(14, ['id' => 109, 'ordem' => 1, 'posicao' => 1, 'tamanho' => 'M'], $arr);
        $this->p(14, ['id' => 110, 'ordem' => 2, 'posicao' => 2, 'tamanho' => 'G'], $arr);
        $this->p(14, ['id' => 111, 'ordem' => 3, 'posicao' => 3, 'tamanho' => 'G1'], $arr);
        $this->p(14, ['id' => 112, 'ordem' => 4, 'posicao' => 4, 'tamanho' => 'G2'], $arr);
        $this->p(14, ['id' => 113, 'ordem' => 5, 'posicao' => 5, 'tamanho' => 'G3'], $arr);
        $this->p(14, ['id' => 114, 'ordem' => 6, 'posicao' => 6, 'tamanho' => 'G4'], $arr);
        $this->p(14, ['id' => 115, 'ordem' => 7, 'posicao' => 7, 'tamanho' => 'G5'], $arr);
        $this->p(14, ['id' => 116, 'ordem' => 8, 'posicao' => 8, 'tamanho' => 'G6'], $arr);
        $this->p(14, ['id' => 117, 'ordem' => 9, 'posicao' => 9, 'tamanho' => 'G7'], $arr);
        $this->p(14, ['id' => 118, 'ordem' => 10, 'posicao' => 10, 'tamanho' => 'G8'], $arr);
        $this->p(15, ['id' => 119, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '24'], $arr);
        $this->p(15, ['id' => 120, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '25'], $arr);
        $this->p(15, ['id' => 121, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '26'], $arr);
        $this->p(15, ['id' => 122, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '27'], $arr);
        $this->p(15, ['id' => 123, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '28'], $arr);
        $this->p(15, ['id' => 124, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '29'], $arr);
        $this->p(15, ['id' => 125, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '30'], $arr);
        $this->p(15, ['id' => 126, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '31'], $arr);
        $this->p(15, ['id' => 127, 'ordem' => 9, 'posicao' => 9, 'tamanho' => '32'], $arr);
        $this->p(15, ['id' => 128, 'ordem' => 10, 'posicao' => 10, 'tamanho' => '33'], $arr);
        $this->p(15, ['id' => 129, 'ordem' => 11, 'posicao' => 11, 'tamanho' => '34'], $arr);
        $this->p(15, ['id' => 130, 'ordem' => 12, 'posicao' => 12, 'tamanho' => '35'], $arr);
        $this->p(17, ['id' => 133, 'ordem' => 1, 'posicao' => 1, 'tamanho' => 'P'], $arr);
        $this->p(17, ['id' => 134, 'ordem' => 2, 'posicao' => 2, 'tamanho' => 'M'], $arr);
        $this->p(17, ['id' => 135, 'ordem' => 3, 'posicao' => 3, 'tamanho' => 'G'], $arr);
        $this->p(17, ['id' => 136, 'ordem' => 4, 'posicao' => 4, 'tamanho' => 'GG'], $arr);
        $this->p(17, ['id' => 137, 'ordem' => 5, 'posicao' => 5, 'tamanho' => 'SG'], $arr);
        $this->p(17, ['id' => 138, 'ordem' => 6, 'posicao' => 6, 'tamanho' => 'S2'], $arr);
        $this->p(17, ['id' => 139, 'ordem' => 7, 'posicao' => 7, 'tamanho' => 'S3'], $arr);
        $this->p(18, ['id' => 159, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '02'], $arr);
        $this->p(18, ['id' => 160, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '04'], $arr);
        $this->p(18, ['id' => 161, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '06'], $arr);
        $this->p(18, ['id' => 162, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '08'], $arr);
        $this->p(18, ['id' => 163, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '10'], $arr);
        $this->p(18, ['id' => 164, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '12'], $arr);
        $this->p(18, ['id' => 165, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '14'], $arr);
        $this->p(18, ['id' => 166, 'ordem' => 8, 'posicao' => 8, 'tamanho' => '16'], $arr);
        $this->p(18, ['id' => 167, 'ordem' => 9, 'posicao' => 9, 'tamanho' => 'P'], $arr);
        $this->p(18, ['id' => 168, 'ordem' => 10, 'posicao' => 10, 'tamanho' => 'M'], $arr);
        $this->p(18, ['id' => 169, 'ordem' => 11, 'posicao' => 11, 'tamanho' => 'G'], $arr);
        $this->p(18, ['id' => 170, 'ordem' => 12, 'posicao' => 12, 'tamanho' => 'XG'], $arr);
        $this->p(18, ['id' => 171, 'ordem' => 13, 'posicao' => 13, 'tamanho' => 'SG'], $arr);
        $this->p(18, ['id' => 172, 'ordem' => 14, 'posicao' => 14, 'tamanho' => 'SS'], $arr);
        $this->p(19, ['id' => 173, 'ordem' => 1, 'posicao' => 8, 'tamanho' => 'PP'], $arr);
        $this->p(19, ['id' => 174, 'ordem' => 2, 'posicao' => 9, 'tamanho' => 'P'], $arr);
        $this->p(19, ['id' => 175, 'ordem' => 3, 'posicao' => 10, 'tamanho' => 'M'], $arr);
        $this->p(19, ['id' => 176, 'ordem' => 4, 'posicao' => 11, 'tamanho' => 'G'], $arr);
        $this->p(19, ['id' => 177, 'ordem' => 5, 'posicao' => 12, 'tamanho' => 'GG'], $arr);
        $this->p(19, ['id' => 178, 'ordem' => 6, 'posicao' => 13, 'tamanho' => 'EG'], $arr);
        $this->p(20, ['id' => 179, 'ordem' => 1, 'posicao' => 1, 'tamanho' => '02'], $arr);
        $this->p(20, ['id' => 180, 'ordem' => 2, 'posicao' => 2, 'tamanho' => '04'], $arr);
        $this->p(20, ['id' => 181, 'ordem' => 3, 'posicao' => 3, 'tamanho' => '06'], $arr);
        $this->p(20, ['id' => 182, 'ordem' => 4, 'posicao' => 4, 'tamanho' => '08'], $arr);
        $this->p(20, ['id' => 183, 'ordem' => 5, 'posicao' => 5, 'tamanho' => '10'], $arr);
        $this->p(20, ['id' => 184, 'ordem' => 6, 'posicao' => 6, 'tamanho' => '12'], $arr);
        $this->p(20, ['id' => 185, 'ordem' => 7, 'posicao' => 7, 'tamanho' => '14'], $arr);
        $this->p(20, ['id' => 186, 'ordem' => 8, 'posicao' => 8, 'tamanho' => 'PP'], $arr);
        $this->p(20, ['id' => 187, 'ordem' => 9, 'posicao' => 9, 'tamanho' => 'P'], $arr);
        $this->p(20, ['id' => 188, 'ordem' => 10, 'posicao' => 10, 'tamanho' => 'M'], $arr);
        $this->p(20, ['id' => 189, 'ordem' => 11, 'posicao' => 11, 'tamanho' => 'G'], $arr);
        $this->p(20, ['id' => 190, 'ordem' => 12, 'posicao' => 12, 'tamanho' => 'GG'], $arr);
        $this->p(20, ['id' => 191, 'ordem' => 13, 'posicao' => 13, 'tamanho' => 'EG'], $arr);
        $this->p(20, ['id' => 192, 'ordem' => 14, 'posicao' => 14, 'tamanho' => 'SG'], $arr);

        return new Response(json_encode($arr));

    }


}