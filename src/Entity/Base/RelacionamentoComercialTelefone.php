<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entidade RelacionamentoComercial.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\RelacionamentoComercialRepository")
 * @ORM\Table(name="bse_relcom_endereco")
 * @author Carlos Eduardo Pauluk
 */
class RelacionamentoComercialTelefone implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Base\RelacionamentoComercial")
     * @ORM\JoinColumn(nullable=false)
     * @var RelacionamentoComercial|null
     */
    private $relacionamentoComercial;

    /**
     *
     * @ORM\Column(name="numero", type="string", nullable=true, length=50)
     * @var string|null
     */
    private $numero;

    /**
     *
     * @ORM\Column(name="tipo", type="string", nullable=true, length=100)
     * @var string|null
     */
    private $tipo;

    /**
     *
     * @ORM\Column(name="obs", type="string", nullable=true, length=3000)
     * @var string|null
     */
    private $obs;


    /**
     * @return RelacionamentoComercial|null
     */
    public function getRelacionamentoComercial(): ?RelacionamentoComercial
    {
        return $this->relacionamentoComercial;
    }

    /**
     * @param RelacionamentoComercial|null $relacionamentoComercial
     */
    public function setRelacionamentoComercial(?RelacionamentoComercial $relacionamentoComercial): void
    {
        $this->relacionamentoComercial = $relacionamentoComercial;
    }

    /**
     * @return null|string
     */
    public function getNumero(): ?string
    {
        return $this->numero;
    }

    /**
     * @param null|string $numero
     */
    public function setNumero(?string $numero): void
    {
        $this->numero = $numero;
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

