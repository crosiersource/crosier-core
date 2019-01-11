<?php

namespace App\Repository\Config;

use App\Entity\Config\StoredViewInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Repository para a entidade StoredViewInfo.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class StoredViewInfoRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StoredViewInfo::class);
    }

}
