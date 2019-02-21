<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\ProgramRepository")
 * @ORM\Table(name="cfg_program")
 * @author Carlos Eduardo Pauluk
 */
class Program implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="descricao", type="string", nullable=false, length=255)
     */
    private $descricao;

    /**
     * Sem o domínio.
     * @ORM\Column(name="url", type="string", nullable=true, length=2000)
     * @NotUppercase()
     */
    private $url;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Config\App")
     * @ORM\JoinColumn(nullable=false)
     */
    private $app;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Config\EntMenu")
     * @ORM\JoinColumn(name="entmenu_id", nullable=true)
     */
    private $entMenu;

    /**
     * @ORM\Column(name="uuid", type="string", nullable=false, length=32)
     * @NotUppercase()
     */
    private $uuid;

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return App|null
     */
    public function getApp(): ?App
    {
        return $this->app;
    }

    /**
     * @param mixed $app
     */
    public function setApp(?App $app): void
    {
        $this->app = $app;
    }

    /**
     * @return string
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(?string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return EntMenu|null
     */
    public function getEntMenu(): ?EntMenu
    {
        return $this->entMenu;
    }

    /**
     * @param EntMenu|null $entMenu
     */
    public function setEntMenu(?EntMenu $entMenu): void
    {
        $this->entMenu = $entMenu;
    }


}

