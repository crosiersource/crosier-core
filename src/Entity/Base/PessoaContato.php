<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Entidade Pessoa.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\PessoaContatoRepository")
 * @ORM\Table(name="bse_pessoa_contato")
 * @author Carlos Eduardo Pauluk
 */
class PessoaContato implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Base\Pessoa")
     * @ORM\JoinColumn(nullable=false)
     * @var Pessoa|null
     */
    private $pessoa;

    /**
     *
     * @ORM\Column(name="tipo", type="string", nullable=true, length=50)
     * @var string|null
     *
     * @Groups("entity")
     */
    private $tipo;

    /**
     *
     * @ORM\Column(name="valor", type="string", nullable=true, length=100)
     * @var string|null
     *
     * @Groups("entity")
     */
    private $valor;

    /**
     *
     * @ORM\Column(name="obs", type="string", nullable=true, length=3000)
     * @var string|null
     *
     * @Groups("entity")
     */
    private $obs;


    /**
     * @return Pessoa|null
     */
    public function getPessoa(): ?Pessoa
    {
        return $this->pessoa;
    }

    /**
     * @param Pessoa|null $pessoa
     */
    public function setPessoa(?Pessoa $pessoa): void
    {
        $this->pessoa = $pessoa;
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
     * @return null|string
     */
    public function getValor(): ?string
    {
        return $this->valor;
    }

    /**
     * @param null|string $valor
     */
    public function setValor(?string $valor): void
    {
        $this->valor = $valor;
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

