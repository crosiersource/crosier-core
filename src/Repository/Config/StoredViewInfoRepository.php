<?php

namespace App\Repository\Config;

use App\Entity\Config\StoredViewInfo;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade StoredViewInfo.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class StoredViewInfoRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return StoredViewInfo::class;
    }
}
