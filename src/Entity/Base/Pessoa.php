<?php

namespace App\Entity\Base;

use App\Entity\Financeiro\TipoPessoa;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entidade 'Pessoa'.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\PessoaRepository")
 * @ORM\Table(name="bon_pessoa")
 */
class Pessoa extends EntityId
{

    /**
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     *
     * @ORM\Column(name="tipo_pessoa", type="string", nullable=false, length=15)
     * @Assert\NotBlank()
     *
     * @var $tipoPessoa TipoPessoa
     */
    private $tipoPessoa = "PESSOA_JURIDICA";

    /**
     * CPF ou CNPJ, somente números (não usar pontuação).
     *
     * @ORM\Column(name="documento", type="string", nullable=true, length=50)
     */
    private $documento;

    /**
     * Para Pessoa Jurídica é a Razão Social.
     *
     * @ORM\Column(name="nome", type="string", nullable=false, length=300)
     * @Assert\Range(min=2, max=300)
     */
    private $nome;

    /**
     * Somente para pessoa jurídica.
     *
     * @ORM\Column(name="nome_fantasia", type="string", nullable=true, length=300)
     * @Assert\Range(min=2, max=300)
     */
    private $nomeFantasia;

    // Abaixo os atributos 'calculados': Somente afins de agilidade para setar e recuperar um endereço principal da pessoa em determinada situação.

    // Mais tarde isso deveria estar na tabela 'relacionamento' como campos reais.

    /**
     *
     * @var Endereco
     */
    private $endereco;

    private $fone1;

    private $fone2;

    private $email;

    private $inscricaoEstadual;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTipoPessoa()
    {
        return $this->tipoPessoa;
    }

    public function setTipoPessoa($tipoPessoa)
    {
        $this->tipoPessoa = $tipoPessoa;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(?Endereco $endereco)
    {
        $this->endereco = $endereco;
    }

    public function getFone1()
    {
        return $this->fone1;
    }

    public function setFone1($fone1)
    {
        $this->fone1 = $fone1;
    }

    public function getFone2()
    {
        return $this->fone2;
    }

    public function setFone2($fone2)
    {
        $this->fone2 = $fone2;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getInscricaoEstadual()
    {
        return $this->inscricaoEstadual;
    }

    public function setInscricaoEstadual($inscricaoEstadual)
    {
        $this->inscricaoEstadual = $inscricaoEstadual;
    }

}

