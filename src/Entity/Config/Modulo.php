<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\ModuloRepository")
 * @ORM\Table(name="cfg_modulo")
 * @author Carlos Eduardo Pauluk
 */
class Modulo implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="nome", type="string", nullable=true, length=300)
     */
    private $nome;

    /**
     *
     * @ORM\Column(name="icon", type="string", nullable=true, length=300)
     */
    private $icon;

    /**
     *
     * @ORM\Column(name="obs", type="string", nullable=true, length=5000)
     */
    private $obs;

    /**
     *
     * @ORM\Column(name="ordem", type="integer", nullable=true)
     */
    private $ordem;

    /**
     *
     * @ORM\Column(name="entrance_url", type="string", nullable=true, length=255)
     */
    private $entranceUrl;


    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
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
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param mixed $obs
     */
    public function setObs($obs): void
    {
        $this->obs = $obs;
    }

    /**
     * @return mixed
     */
    public function getEntranceUrl()
    {
        return $this->entranceUrl;
    }

    /**
     * @param mixed $entranceUrl
     */
    public function setEntranceUrl($entranceUrl): void
    {
        $this->entranceUrl = $entranceUrl;
    }


}