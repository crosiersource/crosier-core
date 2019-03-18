<?php

namespace App\Repository\Base;

use App\Entity\Base\Endereco;
use App\Entity\Base\Pessoa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Repository para a entidade Config.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class EnderecoRepository extends ServiceEntityRepository
{

    private $logger;

    public function __construct(RegistryInterface $registry, LoggerInterface $logger)
    {
        parent::__construct($registry, Endereco::class);
        $this->getLogger = $logger;
    }

    public function findPrimeiroByPessoa(Pessoa $pessoa)
    {
        $sql = 'SELECT * FROM vw_bon_pessoa_enderecos WHERE fornecedor_pessoa_id = ? OR cliente_pessoa_id = ? OR funcionario_pessoa_id = ? LIMIT 1';
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('App\Entity\Base\Endereco', 'e');
        $rsm->addFieldResult('e', 'id', 'id');
        $rsm->addFieldResult('e', 'cep', 'cep');
        $rsm->addFieldResult('e', 'logradouro', 'logradouro');
        $rsm->addFieldResult('e', 'numero', 'numero');
        $rsm->addFieldResult('e', 'complemento', 'complemento');
        $rsm->addFieldResult('e', 'bairro', 'bairro');
        $rsm->addFieldResult('e', 'cidade', 'cidade');
        $rsm->addFieldResult('e', 'estado', 'estado');
        $rsm->addFieldResult('e', 'tipoEndereco', 'tipoEndereco');
        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        $query->setParameter(1, $pessoa->getId());
        $query->setParameter(2, $pessoa->getId());
        $query->setParameter(3, $pessoa->getId());
        $results = $query->getResult();
        if ($results) {
            $id = $results[0]->getId();
            $this->getEntityManager()->flush();
            $endereco = $this->find($id);
            return $endereco;
        } else {
            return null;
        }
    }
}
