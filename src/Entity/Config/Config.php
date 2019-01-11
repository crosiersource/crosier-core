<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\ConfigRepository")
 * @ORM\Table(name="cfg_config")
 */
class Config extends EntityId
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
     * @ORM\Column(name="chave", type="string", nullable=false, length=300)
     * @Assert\NotBlank(message="O campo 'chave' deve ser informado")
     */
    private $chave;

    /**
     *
     * @ORM\Column(name="obs", type="string", nullable=true, length=5000)
     */
    private $obs;

    /**
     *
     * @ORM\Column(name="valor", type="string", nullable=false, length=10000)
     * @Assert\NotBlank(message="O campo 'valor' deve ser informado")
     */
    private $valor;

    /**
     *
     * @ORM\Column(name="global", type="boolean", nullable=false)
     * @Assert\NotNull(message="O campo 'global' deve ser informado")
     */
    private $global;

    public function __construct()
    {
        ORM\Annotation::class;
        Assert\All::class;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getChave()
    {
        return $this->chave;
    }

    public function setChave($chave)
    {
        $this->chave = $chave;
    }

    public function getObs()
    {
        return $this->obs;
    }

    public function setObs($obs)
    {
        $this->obs = $obs;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getGlobal()
    {
        return $this->global;
    }

    public function setGlobal($global)
    {
        $this->global = $global;
    }
}
    