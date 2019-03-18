<?php

namespace App\Repository\Base;


use App\Entity\Base\CategoriaRelacionamentoComercial;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade CategoriaRelacionamentoComercial.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class CategoriaRelacionamentoComercialRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return CategoriaRelacionamentoComercial::class;
    }

}
