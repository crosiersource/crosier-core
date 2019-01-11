<?php

namespace App\Repository\Base;

use App\Entity\Base\Pessoa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Repository para a entidade Pessoa.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class PessoaRepository extends ServiceEntityRepository
{

    private $logger;

    public function __construct(RegistryInterface $registry, LoggerInterface $logger)
    {
        parent::__construct($registry, Pessoa::class);
        $this->getLogger = $logger;
    }

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

    public function findAllByNome($str)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

//         $qb->select('e')
//             ->from('App\Entity\Financeiro\Movimentacao', 'e')
//             ->join('App\Entity\Base\Pessoa', 'p', Join::WITH, 'e.pessoa = p')
//             ->where('p.nome LIKE :str OR p.nomeFantasia LIKE :str');

        $qb->select('e.id, e.documento, e.nome, e.nomeFantasia')
            ->from('App\Entity\Base\Pessoa', 'e')
            ->where('e.nome LIKE :str OR e.nomeFantasia LIKE :str');

        $qb->setParameter("str", "%" . $str . "%");

        // $dql = $qb->getDql();

        // $sql = $qb->getQuery()->getSQL();

        $qb->setMaxResults(20);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findAllByNomez($str)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

//         $qb->select('e')
//             ->from('App\Entity\Financeiro\Movimentacao', 'e')
//             ->join('App\Entity\Base\Pessoa', 'p', Join::WITH, 'e.pessoa = p')
//             ->where('p.nome LIKE :str OR p.nomeFantasia LIKE :str');

        $qb->select('e')
            ->from('App\Entity\Base\Pessoa', 'e')
            ->where('e.nome LIKE :str OR e.nomeFantasia LIKE :str');

        $qb->setParameter("str", "%" . $str . "%");

        // $dql = $qb->getDql();

        // $sql = $qb->getQuery()->getSQL();

        $qb->setMaxResults(20);

        $query = $qb->getQuery();

        return $query->execute();
    }

    /**
     * Tenta encontrar um relacionamento (Cliente, Fornecedor, Funcionario) para a pessoa.
     *
     * @param Pessoa $pessoa
     * @return NULL
     * @throws \Exception
     */
    public function findRelacionamento(Pessoa $pessoa)
    {
        $repoCliente = $this->getEntityManager()->getRepository('App\Entity\CRM\Cliente');
        $pessoaCliente = $repoCliente->findByPessoa($pessoa);
        if ($pessoaCliente) {
            return $pessoaCliente;
        }

        $repoFornecedor = $this->getEntityManager()->getRepository('App\Entity\Estoque\Fornecedor');
        $pessoaFornecedor = $repoFornecedor->findByPessoa($pessoa);
        if ($pessoaFornecedor) {
            return $pessoaFornecedor;
        }

        $repoFuncionario = $this->getEntityManager()->getRepository('App\Entity\RH\Funcionario');
        $pessoaFuncionario = $repoFuncionario->findByPessoa($pessoa);
        if ($pessoaFuncionario) {
            return $pessoaFuncionario;
        }

        return null;
    }
}
