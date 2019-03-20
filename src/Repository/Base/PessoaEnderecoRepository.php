<?php

namespace App\Repository\Base;


use App\Entity\Base\PessoaEndereco;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade PessoaEndereco.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class PessoaEnderecoRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return PessoaEndereco::class;
    }

}
