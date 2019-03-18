<?php

namespace App\Repository\Base;


use App\Entity\Base\RelacionamentoComercialTelefone;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade RelacionamentoComercialTelefone.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class RelacionamentoComercialTelefoneRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return RelacionamentoComercialTelefone::class;
    }

}
