<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Entidade Pessoa.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\PessoaRepository")
 * @ORM\Table(name="bse_pessoa")
 * @author Carlos Eduardo Pauluk
 */
class Pessoa implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * Para Pessoa Jurídica é a Razão Social.
     *
     * @ORM\Column(name="nome", type="string", nullable=false, length=300)
     * @var null|string
     * @Groups("entity")
     */
    private $nome;

    /**
     *
     * CPF/CNPJ.
     *
     * @ORM\Column(name="documento", type="string", nullable=true, length=20)
     * @var null|string
     * @Groups("entity")
     */
    private $documento;

    /**
     * No banco é um ENUM('Pessoa Física', 'Pessoa Jurídica')
     *
     * @ORM\Column(name="tipo", type="string", nullable=false, length=100)
     * @var null|string
     * @Groups("entity")
     */
    private $tipo;

    /**
     *
     * @ORM\ManyToMany(targetEntity="CategoriaPessoa")
     * @ORM\JoinTable(name="bse_pessoa_categ_pessoa",
     *      joinColumns={@ORM\JoinColumn(name="categ_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="pessoa_id", referencedColumnName="id")}
     * )
     * @var null|Collection|CategoriaPessoa[]
     */
    private $categorias;


    /**
     *
     * @ORM\Column(name="nome_fantasia", type="string", nullable=true, length=255)
     * @var null|string
     * @Groups("entity")
     */
    private $nomeFantasia;

    /**
     *
     * @ORM\Column(name="ie", type="string", nullable=true, length=20)
     * @var null|string
     * @Groups("entity")
     */
    private $inscricaoEstadual;

    /**
     *
     * @ORM\Column(name="rg", type="string", nullable=true, length=20)
     * @var null|string
     * @Groups("entity")
     */
    private $rg;

    /**
     *
     * @ORM\Column(name="obs", type="string", nullable=true, length=3000)
     * @var null|string
     * @Groups("entity")
     */
    private $obs;


    public function __construct()
    {
        $this->categorias = new ArrayCollection();
    }

    /**
     * @return null|string
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param null|string $nome
     */
    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return null|string
     */
    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    /**
     * @param null|string $documento
     */
    public function setDocumento(?string $documento): void
    {
        $this->documento = $documento;
    }

    /**
     * @return null|string
     */
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    /**
     * @param null|string $tipo
     */
    public function setTipo(?string $tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return CategoriaPessoa[]|Collection|null
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * @param CategoriaPessoa[]|Collection|null $categorias
     */
    public function setCategorias($categorias): void
    {
        $this->categorias = $categorias;
    }

    /**
     * @return null|string
     */
    public function getNomeFantasia(): ?string
    {
        return $this->nomeFantasia;
    }

    /**
     * @param null|string $nomeFantasia
     */
    public function setNomeFantasia(?string $nomeFantasia): void
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    /**
     * @return null|string
     */
    public function getInscricaoEstadual(): ?string
    {
        return $this->inscricaoEstadual;
    }

    /**
     * @param null|string $inscricaoEstadual
     */
    public function setInscricaoEstadual(?string $inscricaoEstadual): void
    {
        $this->inscricaoEstadual = $inscricaoEstadual;
    }

    /**
     * @return null|string
     */
    public function getRg(): ?string
    {
        return $this->rg;
    }

    /**
     * @param null|string $rg
     */
    public function setRg(?string $rg): void
    {
        $this->rg = $rg;
    }

    /**
     * @return null|string
     */
    public function getObs(): ?string
    {
        return $this->obs;
    }

    /**
     * @param null|string $obs
     */
    public function setObs(?string $obs): void
    {
        $this->obs = $obs;
    }


}

