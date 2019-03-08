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
     * @var string
     * @ORM\Column(name="uuid", type="string", nullable=false, length=36)
     * @NotUppercase()
     */
    private $UUID;

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
     * @var string
     * @ORM\Column(name="app_uuid", type="string", nullable=false, length=36)
     * @NotUppercase()
     */
    private $appUUID;

    /**
     * @var string
     * @ORM\Column(name="entmenu_uuid", type="string", nullable=true, length=36)
     * @NotUppercase()
     */
    private $entMenuUUID;




    /**
     * @return string
     */
    public function getUUID(): string
    {
        return $this->UUID;
    }

    /**
     * @param string $UUID
     */
    public function setUUID(string $UUID): void
    {
        $this->UUID = $UUID;
    }

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
     * @return string
     */
    public function getAppUUID(): string
    {
        return $this->appUUID;
    }

    /**
     * @param string $appUUID
     */
    public function setAppUUID(string $appUUID): void
    {
        $this->appUUID = $appUUID;
    }

    /**
     * @return null|string
     */
    public function getEntMenuUUID(): ?string
    {
        return $this->entMenuUUID;
    }

    /**
     * @param null|string $entMenuUUID
     */
    public function setEntMenuUUID(?string $entMenuUUID): void
    {
        $this->entMenuUUID = $entMenuUUID;
    }


}

