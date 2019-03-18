<?php

namespace App\Repository\Base;


use App\Entity\Base\RelacionamentoComercialEndereco;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade RelacionamentoComercialEndereco.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class RelacionamentoComercialEnderecoRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return RelacionamentoComercialEndereco::class;
    }

}
