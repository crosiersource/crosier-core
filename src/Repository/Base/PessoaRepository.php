<?php

namespace App\Repository\Base;

use App\Entity\Base\Pessoa;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use Psr\Log\LoggerInterface;

/**
 * Repository para a entidade Pessoa.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class PessoaRepository extends FilterRepository
{

    /** @var LoggerInterface */
    private $logger;

    /**
     * @required
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Pessoa::class;
    }

    /**
     * @param $documento
     * @return null
     */
    public function findByDocumento($documento)
    {

        $ql = "SELECT p FROM App\Entity\Base\Pessoa p WHERE p.documento = :documento";
        $query = $this->getEntityManager()->createQuery($ql);
        $query->setParameters(array(
            'documento' => $documento
        ));

        $results = $query->getResult();

//         if (count($results) > 1) {
//             throw new \Exception('Mais de uma pessoa encontrada para [' . $documento . ']');
//         }

//         return count($results) == 1 ? $results[0] : null;
        return $results ? $results[0] : null;
    }

    /**
     * @param $str
     * @return mixed
     */
    public function findAllByNome($str)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select('e.id, e.documento, e.nome, e.nomeFantasia')
            ->from(Pessoa::class, 'e')
            ->where('e.nome LIKE :str OR e.nomeFantasia LIKE :str');

        $qb->setParameter('str', '%' . $str . '%');

        // $dql = $qb->getDql();

        // $sql = $qb->getQuery()->getSQL();

        $qb->setMaxResults(20);

        $query = $qb->getQuery();

        return $query->execute();
    }

    /**
     * @param $str
     * @return mixed
     */
    public function findAllByNomez($str)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select('e')
            ->from(Pessoa::class, 'e')
            ->where('e.nome LIKE :str OR e.nomeFantasia LIKE :str');

        $qb->setParameter('str', '%' . $str . '%');
        $qb->setMaxResults(20);
        $query = $qb->getQuery();
        return $query->execute();
    }


}
