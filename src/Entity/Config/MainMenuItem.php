<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="cfg_mainmenuitem")
 * @author Carlos Eduardo Pauluk
 */
class MainMenuItem implements EntityId
{

    use EntityIdTrait;

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
     * Pode ser null nos casos de, por exemplo, um delimitador (<hr>).
     * FIXME: alterar para Programa
     * @ORM\ManyToOne(targetEntity="CrosierSource\CrosierLibBaseBundle\Entity\Config\App")
     * @ORM\JoinColumn(nullable=true)
     */
    private $programa;


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
     * @return mixed
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * @param mixed $programa
     */
    public function setPrograma($programa): void
    {
        $this->programa = $programa;
    }


}