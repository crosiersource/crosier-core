<?php

namespace App\Controller\Config\API;

use Psr\Log\LoggerInterface;
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
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(\Symfony\Component\Asset\Packages $assetsManager, LoggerInterface $logger)
    {
        $this->assetsManager = $assetsManager;
        $this->logger = $logger;
    }


    /**
     * @Route("/getCrosierAssetUrl/", name="getCrosierAssetUrl")
     */
    public function getCrosierAssetUrl(Request $request)
    {
        $this->logger->debug('responding getCrosierAssetUrl()');
        $asset = $request->get('asset');
        $this->logger->debug('asset = "' . $asset . '"');
        return new JsonResponse(['url' => $this->assetsManager->getUrl($asset)]);
    }


}