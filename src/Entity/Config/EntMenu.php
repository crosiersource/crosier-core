<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\EntMenuRepository")
 * @ORM\Table(name="cfg_entmenu")
 * @author Carlos Eduardo Pauluk
 */
class EntMenu implements EntityId
{

    use EntityIdTrait;

    /**
     * @var string
     * @ORM\Column(name="uuid", type="string", nullable=false, length=36)
     * @NotUppercase()
     */
    private $UUID;

    /**
     *
     * @ORM\Column(name="label", type="string", nullable=false, length=255)
     * @NotUppercase()
     */
    private $label;

    /**
     *
     * @ORM\Column(name="icon", type="string", nullable=true, length=50)
     * @NotUppercase()
     */
    private $icon;

    /**
     *
     * @ORM\Column(name="tipo", type="string", nullable=false, length=50)
     */
    private $tipo;

    /**
     *
     * @ORM\Column(name="ordem", type="integer", nullable=true)
     */
    private $ordem;

    /**
     *
     * @ORM\Column(name="css_style", type="string", nullable=true, length=200)
     * @NotUppercase()
     */
    private $cssStyle;

    /**
     * @var string
     * @ORM\Column(name="program_uuid", type="string", nullable=true, length=36)
     * @NotUppercase()
     */
    private $programUUID;

    /**
     * @var string
     * @ORM\Column(name="pai_uuid", type="string", nullable=true, length=36)
     * @NotUppercase()
     */
    private $paiUUID;

    /**
     * TRANSIENT
     * @var EntMenu
     */
    private $pai;

    /**
     * TRANSIENT
     * @var EntMenu[]|ArrayCollection
     */
    private $filhos;

    public function __construct()
    {
        $this->filhos = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getUUID(): ?string
    {
        return $this->UUID;
    }

    /**
     * @param string $UUID
     */
    public function setUUID(?string $UUID): void
    {
        $this->UUID = $UUID;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * @param mixed $ordem
     */
    public function setOrdem($ordem): void
    {
        $this->ordem = $ordem;
    }

    /**
     * @return mixed
     */
    public function getCssStyle()
    {
        return $this->cssStyle;
    }

    /**
     * @param mixed $cssStyle
     */
    public function setCssStyle($cssStyle): void
    {
        $this->cssStyle = $cssStyle;
    }

    /**
     * @return string|null
     */
    public function getProgramUUID(): ?string
    {
        return $this->programUUID;
    }

    /**
     * @param string|null $programUUID
     */
    public function setProgramUUID(?string $programUUID): void
    {
        $this->programUUID = $programUUID;
    }

    /**
     * @return string|null
     */
    public function getPaiUUID(): ?string
    {
        return $this->paiUUID;
    }

    /**
     * @param string|null $paiUUID
     */
    public function setPaiUUID(?string $paiUUID): void
    {
        $this->paiUUID = $paiUUID;
    }

    /**
     * @return EntMenu|null
     */
    public function getPai(): ?EntMenu
    {
        return $this->pai;
    }

    /**
     * @param EntMenu|null $pai
     */
    public function setPai(?EntMenu $pai): void
    {
        $this->pai = $pai;
    }

    /**
     * @return EntMenu[]|ArrayCollection
     */
    public function getFilhos()
    {
        return $this->filhos;
    }

    /**
     * @param EntMenu[]|ArrayCollection $filhos
     */
    public function setFilhos($filhos): void
    {
        $this->filhos = $filhos;
    }


}

