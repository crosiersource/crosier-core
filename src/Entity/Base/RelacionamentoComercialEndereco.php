<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use CrosierSource\CrosierLibBaseBundle\Entity\Utils\EnderecoTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entidade RelacionamentoComercial.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\RelacionamentoComercialRepository")
 * @ORM\Table(name="bse_relcom_endereco")
 * @author Carlos Eduardo Pauluk
 */
class RelacionamentoComercialEndereco implements EntityId
{

    use EntityIdTrait;

    use EnderecoTrait;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Base\RelacionamentoComercial")
     * @ORM\JoinColumn(nullable=false)
     * @var RelacionamentoComercial|null
     */
    private $relacionamentoComercial;

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


}

