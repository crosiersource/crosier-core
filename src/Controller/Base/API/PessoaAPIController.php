<?php

namespace App\Controller\Base\API;

use App\Entity\Base\Pessoa;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PessoaAPIController.
 *
 * @package App\Controller\Base\API
 * @author Carlos Eduardo Pauluk
 */
class PessoaAPIController extends BaseAPIEntityIdController
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Pessoa::class;
    }


    /**
     *
     * @Route("/api/bse/pessoa/findById/{id}", name="api_bse_pessoa_findById", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return parent::findById($id);
    }


    /**
     *
     * @Route("/api/bse/pessoa/findByFilters/", name="api_bse_pessoa_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        $content = $request->getContent();
        return parent::doFindByFilters($content);
    }


    /**
     *
     * @Route("/api/bse/pessoa/findByStr/{str}", name="api_bse_pessoa_findByStr")
     * @param string $str
     * @return JsonResponse
     */
    public function findByStr(string $str): JsonResponse
    {
        $filters = [
            'filters' =>
                [[
                    'field' => ['nome', 'nomeFantasia', 'documento'],
                    'compar' => 'LIKE',
                    'val' => '%' . $str . '%'
                ]]
        ];
        return $this->doFindByFilters(json_encode($filters));
    }

    /**
     *
     * @Route("/api/bse/pessoa/findByCategEStr/{categ}/{str}", name="api_bse_pessoa_findByCategEStr", defaults={"str"=null})
     * @param string $str
     * @return JsonResponse
     */
    public function findByCategEStr(string $categ, string $str = null): JsonResponse
    {
        $filters = [];
        $filters [] = [
            'field' => ['categ.descricao'],
            'compar' => 'LIKE',
            'val' => $categ
        ];
        if ($str) {
            $filters[] = [
                'field' => ['nome', 'nomeFantasia', 'documento'],
                'compar' => 'LIKE',
                'val' => '%' . $str . '%'
            ];

        }
        return $this->doFindByFilters(json_encode(['filters' => $filters]));

    }
}
