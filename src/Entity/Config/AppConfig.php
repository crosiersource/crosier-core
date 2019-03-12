<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\AppConfigRepository")
 * @ORM\Table(name="cfg_app_config")
 *
 * @author Carlos Eduardo Pauluk
 */
class AppConfig implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="chave", type="string", nullable=true, length=255)
     * @NotUppercase()
     */
    private $chave;

    /**
     *
     * @ORM\Column(name="valor", type="text", nullable=true)
     * @NotUppercase()
     */
    private $valor;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Config\App")
     * @ORM\JoinColumn(nullable=false)
     */
    private $app;

    /**
     * @return mixed
     */
    public function getChave(): string
    {
        return $this->chave;
    }

    /**
     * @param mixed $chave
     */
    public function setChave(string $chave): void
    {
        $this->chave = $chave;
    }

    /**
     * @return mixed
     */
    public function getValor(): string
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor(string $valor): void
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getApp(): App
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


}