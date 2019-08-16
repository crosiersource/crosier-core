<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\AppRepository")
 * @ORM\Table(name="cfg_app")
 *
 * @author Carlos Eduardo Pauluk
 */
class App implements EntityId
{

    use EntityIdTrait;


    /**
     * @ORM\Column(name="uuid", type="string", nullable=false, length=36)
     * @NotUppercase()
     * @Groups("entity")
     *
     * @var string
     */
    private $UUID;

    /**
     *
     * @ORM\Column(name="nome", type="string", nullable=true, length=300)
     * @NotUppercase()
     * @Groups("entity")
     *
     * @var string|null
     */
    private $nome;

    /**
     *
     * @ORM\Column(name="obs", type="string", nullable=true, length=5000)
     * @Groups("entity")
     *
     * @var string|null
     */
    private $obs;

    /**
     * @ORM\Column(name="default_entmenu_uuid", type="string", nullable=true, length=36)
     * @NotUppercase()
     * @Groups("entity")
     *
     * @var string|null
     */
    private $defaultEntMenuUUID;

    /**
     *
     * @var AppConfig[]|ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="AppConfig",
     *      mappedBy="app",
     *      orphanRemoval=true
     * )
     */
    private $configs;


    public function __construct()
    {
        $this->configs = new ArrayCollection();
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
     * @return null|string
     */
    public function getDefaultEntMenuUUID(): ?string
    {
        return $this->defaultEntMenuUUID;
    }

    /**
     * @param null|string $defaultEntMenuUUID
     */
    public function setDefaultEntMenuUUID(?string $defaultEntMenuUUID): void
    {
        $this->defaultEntMenuUUID = $defaultEntMenuUUID;
    }

    /**
     * @return Collection|null
     */
    public function getConfigs(): ?Collection
    {
        return $this->configs;
    }

    /**
     * @param Collection|null $configs
     */
    public function setConfigs(?Collection $configs): void
    {
        $this->configs = $configs;
    }


}