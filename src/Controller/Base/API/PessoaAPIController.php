<?php

namespace App\Controller\Base\API;

use App\Entity\Base\Pessoa;
use App\Entity\Base\PessoaContato;
use App\Entity\Base\PessoaEndereco;
use App\EntityHandler\Base\PessoaEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use CrosierSource\CrosierLibBaseBundle\Utils\EntityIdUtils\EntityIdUtils;
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

    /** @var PessoaEntityHandler */
    protected $entityHandler;

    /**
     * @required
     * @param PessoaEntityHandler $entityHandler
     */
    public function setEntityHandler(PessoaEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }


    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Pessoa::class;
    }


    /**
     *
     * @Route("/api/bse/pessoa/findById/{id}", name="api_bse_pessoa_findById", requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return $this->doFindById($id);
    }


    /**
     *
     * @Route("/api/bse/pessoa/findByFilters/", name="api_bse_pessoa_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        return $this->doFindByFilters($request);
    }

    /**
     *
     * @Route("/api/bse/pessoa/getNew", name="api_bse_pessoa_getNew")
     * @return JsonResponse
     */
    public function getNew(): JsonResponse
    {
        $pessoa = new Pessoa();
        $pessoa->addEndereco(new PessoaEndereco());
        $pessoa->addContato(new PessoaContato());
        return new JsonResponse(['entity' => EntityIdUtils::serialize($pessoa)]);
    }


    /**
     *
     * @Route("/api/bse/pessoa/save", name="api_bse_pessoa_save")
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse
    {
        return $this->doSave($request);
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
     * @Route("/api/bse/pessoa/findByCategEStr", name="api_bse_pessoa_findByCategEStr")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByCategEStr(Request $request): JsonResponse
    {
        $categ = $request->get('categ');
        $str = $request->get('str');
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

        $parameters['filters'] = $filters;
        $parameters['limit'] = $request->get('limit') ?? 100;

        return $this->doFindByFilters(json_encode($parameters));

    }



}
