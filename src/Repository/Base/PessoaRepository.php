<?php

namespace App\Repository\Base;

use App\Entity\Base\CategoriaPessoa;
use App\Entity\Base\Pessoa;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use Doctrine\ORM\QueryBuilder;
use Psr\Log\LoggerInterface;

/**
 * Repository para a entidade Pessoa.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class PessoaRepository extends FilterRepository
{

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Pessoa::class;
    }

    public function handleFrombyFilters(QueryBuilder $qb)
    {
        return $qb->from($this->getEntityClass(), 'e')
            ->leftJoin(CategoriaPessoa::class, 'categ', 'WITH', 'categ MEMBER OF e.categorias');
    }


}
