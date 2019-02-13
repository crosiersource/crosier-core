<?php

namespace App\Repository\Base;

use App\Entity\Base\Municipio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Repository para a entidade Municipio.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class MunicipioRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Municipio::class);
    }

    public function findByNomeAndUf($nome, $uf)
    {
        $ql = "SELECT m FROM App\Entity\Base\Municipio m WHERE m.municipioNome = :nome AND m.ufSigla = :uf";
        $query = $this->getEntityManager()->createQuery($ql);
        $query->setParameters(array(
            'nome' => $nome,
            'uf' => $uf
        ));

        $results = $query->getResult();

        if (count($results) > 1) {
            throw new \Exception('Mais de um Município encontrado para [' . $nome . "] [" . $uf . ']');
        }

        return count($results) == 1 ? $results[0] : null;
    }
}
