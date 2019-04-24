<?php

namespace App\Controller\Base\API;

use App\Entity\Base\Prop;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PropAPIController.
 *
 * @package App\Controller\Base\API
 * @author Carlos Eduardo Pauluk
 */
class PropAPIController extends BaseAPIEntityIdController
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Prop::class;
    }


    /**
     *
     * @Route("/api/bse/prop/findByUUID/{uuid}", name="api_bse_prop_findByUUID", requirements={"id"="[\w-]{36}"})
     * @param string $UUID
     * @return JsonResponse
     */
    public function findByUUID(string $UUID): JsonResponse
    {
        $filters = [
            'filters' =>
                [[
                    'field' => ['uuid'],
                    'compar' => 'EQ',
                    'val' => $UUID
                ]]
        ];
        $r = $this->doFindByFilters(json_encode($filters));
        return $r['results'][0] ?? null;
    }

    /**
     *
     * @Route("/api/bse/prop/findByNome/{nome}", name="api_bse_prop_findByNome")
     * @param string $nome
     * @return JsonResponse
     */
    public function findByNome(string $nome): JsonResponse
    {
        $filters = [
            'filters' =>
                [[
                    'field' => ['nome'],
                    'compar' => 'EQ',
                    'val' => $nome
                ]]
        ];
        $r = $this->doFindByFilters(json_encode($filters));
        $r = json_decode($r->getContent(),true);
        return new JsonResponse($r['results'][0] ?? null);
    }


    /**
     *
     * @Route("/api/bse/prop/findByFilters/", name="api_bse_prop_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        $content = $request->getContent();
        return parent::doFindByFilters($content);
    }


}
