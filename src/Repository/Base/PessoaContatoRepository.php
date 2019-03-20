<?php

namespace App\Repository\Base;


use App\Entity\Base\PessoaContato;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade PessoaContato.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class PessoaContatoRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return PessoaContato::class;
    }

}
