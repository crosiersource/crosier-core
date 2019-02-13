<?php

namespace App\Controller\Config\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CrosierCoreAssetController extends AbstractController
{


    /**
     * @var \Symfony\Component\Asset\Packages
     */
    private $assetsManager;

    public function __construct(\Symfony\Component\Asset\Packages $assetsManager)
    {
        $this->assetsManager = $assetsManager;
    }


    /**
     * @Route("/getCrosierAssetUrl/", name="getCrosierAssetUrl")
     */
    public function getCrosierAssetUrl(Request $request)
    {
        $asset = $request->get('asset');
        return new JsonResponse(['url' => $this->assetsManager->getUrl($asset)]);
    }


}