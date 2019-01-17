<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 13/09/18
 * Time: 21:53
 */

namespace App\Business\Config;


use App\Entity\Config\StoredViewInfo;
use App\EntityHandler\Config\StoredViewInfoEntityHandler;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Security\Core\Security;

class StoredViewInfoBusiness
{

    private $doctrine;

    private $security;

    private $entityHandler;

    public function __construct(RegistryInterface $doctrine, Security $security, StoredViewInfoEntityHandler $entityHandler)
    {
        $this->doctrine = $doctrine;
        $this->security = $security;
        $this->entityHandler = $entityHandler;
    }

    public function store($viewName, $viewInfo)
    {
        $serialized = serialize($viewInfo);

        $params['viewName'] = $viewName;
        $params['user'] = $this->security->getUser();
        $storedViewInfo = $this->doctrine->getRepository(StoredViewInfo::class)->findOneBy($params);
        if (!$storedViewInfo) {
            $storedViewInfo = new StoredViewInfo();
            $storedViewInfo->setViewName($viewName);
            $storedViewInfo->setUser($this->security->getUser());

        }
        $storedViewInfo->setViewInfo($serialized);

        $this->entityHandler->save($storedViewInfo);
    }

    public function retrieve($viewRoute)
    {
        $params['viewName'] = $viewRoute;
        $params['user'] = $this->security->getUser();

        return $this->doctrine->getRepository(StoredViewInfo::class)->findOneBy($params);
    }

    public function clear($viewRoute)
    {
        $params['viewName'] = $viewRoute;
        $params['user'] = $this->security->getUser();

        $storedViewInfo = $this->doctrine->getRepository(StoredViewInfo::class)->findOneBy($params);
        if ($storedViewInfo) {
            $this->entityHandler->delete($storedViewInfo);
        }
    }


}