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

    public function getAllTipos() {
        $r = $this->getEntityManager()->createQuery('SELECT DISTINCT t From App\Entity\Base\PessoaContato t')->getResult();
        $a = [];
        /** @var PessoaContato $t */
        foreach ($r as $t) {
            $a[] = $t->getTipo();
        }
        return $a;
    }

}
