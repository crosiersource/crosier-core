<?php

namespace App\Repository\Config;

use App\Entity\Config\Estabelecimento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Repository para a entidade Estabelecimento.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class EstabelecimentoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Estabelecimento::class);
    }

}
