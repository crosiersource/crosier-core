<?php

namespace App\Repository\Base;


use App\Entity\Base\Prop;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade Prop.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class PropRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Prop::class;
    }

}
