<?php

namespace App\Repository\Base;


use App\Entity\Base\CategoriaPessoa;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade CategoriaPessoa.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class CategoriaPessoaRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return CategoriaPessoa::class;
    }

}
