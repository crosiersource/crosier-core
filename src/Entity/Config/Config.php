<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\ConfigRepository")
 * @ORM\Table(name="cfg_config")
 *
 * @author Carlos Eduardo Pauluk
 */
class Config implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="chave", type="string", nullable=false, length=300)
     * @Groups("entity")
     *
     * @var null|string
     */
    private $chave;

    /**
     *
     * @ORM\Column(name="obs", type="string", nullable=true, length=5000)
     * @Groups("entity")
     *
     * @var null|string
     */
    private $obs;

    /**
     *
     * @ORM\Column(name="valor", type="string", nullable=false, length=10000)
     * @Groups("entity")
     *
     * @var null|string
     */
    private $valor;

    /**
     *
     * @ORM\Column(name="global", type="boolean", nullable=false)
     * @Groups("entity")
     *
     * @var null|bool
     */
    private $global;

    /**
     * @return null|string
     */
    public function getChave(): ?string
    {
        return $this->chave;
    }

    /**
     * @param null|string $chave
     * @return Config
     */
    public function setChave(?string $chave): Config
    {
        $this->chave = $chave;
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
     * @return Config
     */
    public function setObs(?string $obs): Config
    {
        $this->obs = $obs;
        return $this;
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
     * @return Config
     */
    public function setValor(?string $valor): Config
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGlobal(): ?bool
    {
        return $this->global;
    }

    /**
     * @param bool|null $global
     * @return Config
     */
    public function setGlobal(?bool $global): Config
    {
        $this->global = $global;
        return $this;
    }


}
    