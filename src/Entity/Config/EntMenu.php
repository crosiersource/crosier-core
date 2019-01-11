<?php

namespace App\Entity\Config;

use App\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\EntMenuRepository")
 * @ORM\Table(name="cfg_entmenu")
 * @author Carlos Eduardo Pauluk
 */
class EntMenu extends EntityId
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
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Config\App")
     * @ORM\JoinColumn(nullable=true)
     */
    private $app;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Config\EntMenu", inversedBy="filhos")
     * @ORM\JoinColumn(nullable=true)
     */
    private $pai;

    /**
     *
     * @var EntMenu[]|ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="EntMenu",
     *      mappedBy="pai",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"ordem" = "ASC"})
     */
    private $filhos;

    public function __construct()
    {
        $this->filhos = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
     * @return mixed
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param mixed $app
     */
    public function setApp($app): void
    {
        $this->app = $app;
    }

    /**
     * @return mixed
     */
    public function getPai()
    {
        return $this->pai;
    }

    /**
     * @param mixed $pai
     */
    public function setPai($pai): void
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


}

