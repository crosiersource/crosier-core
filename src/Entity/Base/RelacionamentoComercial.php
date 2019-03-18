<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entidade RelacionamentoComercial.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\RelacionamentoComercialRepository")
 * @ORM\Table(name="bse_relcom")
 * @author Carlos Eduardo Pauluk
 */
class RelacionamentoComercial implements EntityId
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


}

