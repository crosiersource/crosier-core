<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\PropRepository")
 * @ORM\Table(name="bse_prop")
 */
class Prop implements EntityId
{

    use EntityIdTrait;

    /**
     * @ORM\Column(name="uuid", type="string", nullable=false, length=36)
     * @NotUppercase()
     * @Groups("entity")
     *
     * @var null|string
     */
    private $UUID;

    /**
     * @ORM\Column(name="nome", type="string", nullable=false, length=100)
     * @Groups("entity")
     *
     * @var null|string
     */
    private $nome;

    /**
     *
     * @ORM\Column(name="obs", type="string", nullable=true, length=3000)
     * @NotUppercase()
     * @Groups("entity")
     *
     * @var null|string
     */
    private $obs;

    /**
     * @ORM\Column(name="valor", type="json")
     * @NotUppercase()
     * @Groups("entity")
     *
     * @var null|string
     */
    private $valores;

    /**
     * @return null|string
     */
    public function getUUID(): ?string
    {
        return $this->UUID;
    }

    /**
     * @param null|string $UUID
     * @return Prop
     */
    public function setUUID(?string $UUID): Prop
    {
        $this->UUID = $UUID;
        return $this;
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
     * @return Prop
     */
    public function setNome(?string $nome): Prop
    {
        $this->nome = $nome;
        return $this;
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
     * @return Prop
     */
    public function setObs(?string $obs): Prop
    {
        $this->obs = $obs;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValores(): ?string
    {
        return $this->valores;
    }

    /**
     * @param string|null $valores
     * @return Prop
     */
    public function setValores(?string $valores): Prop
    {
        $this->valores = $valores;
        return $this;
    }


}
    