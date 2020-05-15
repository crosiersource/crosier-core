<?php

namespace App\Controller\Config;

use CrosierSource\CrosierLibBaseBundle\Twig\CrosierCoreAssetExtension;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Este Controller deve trabalhar apenas em conjunto com o CrosierCoreAssetExtension.
 *
 * @author Carlos Eduardo Pauluk
 */
class CrosierCoreAssetController extends AbstractController
{

    private CrosierCoreAssetExtension $crosierCoreAssetExtension;

    public function __construct(CrosierCoreAssetExtension $crosierCoreAssetExtension)
    {
        $this->crosierCoreAssetExtension = $crosierCoreAssetExtension;
    }

    /**
     * Só é chamado por crosierapps, pois o CrosierCoreAssetExtension verifica se está no core ou não.
     *
     * @Route("/getCrosierAssetUrl", name="getCrosierAssetUrl")
     * @param Request $request
     * @return JsonResponse
     */
    public function getCrosierAssetUrl(Request $request): JsonResponse
    {
        $asset = $request->get('asset');
        return new JsonResponse(['url' => $this->crosierCoreAssetExtension->getAsset($asset)]);
    }

    /**
     * Só é chamado por crosierapps, pois o CrosierCoreAssetExtension verifica se está no core ou não.
     *
     * @Route("/getRenderCrosierWebpackScriptTags", name="getRenderCrosierWebpackScriptTags")
     * @param Request $request
     * @return Response
     */
    public function getRenderCrosierWebpackScriptTags(Request $request): Response
    {
        $entryName = $request->get('entryName');
        return new Response($this->crosierCoreAssetExtension->getRenderCrosierWebpackScriptTags($entryName));
    }

    /**
     * Só é chamado por crosierapps, pois o CrosierCoreAssetExtension verifica se está no core ou não.
     *
     * @Route("/getRenderCrosierWebpackLinkTags", name="getRenderCrosierWebpackLinkTags")
     * @param Request $request
     * @return Response
     */
    public function getRenderCrosierWebpackLinkTags(Request $request): Response
    {
        $entryName = $request->get('entryName');
        return new Response($this->crosierCoreAssetExtension->getRenderCrosierWebpackLinkTags($entryName));
    }


}