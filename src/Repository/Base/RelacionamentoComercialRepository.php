<?php

namespace App\Repository\Base;


use App\Entity\Base\RelacionamentoComercial;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade RelacionamentoComercial.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class RelacionamentoComercialRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return RelacionamentoComercial::class;
    }

}
