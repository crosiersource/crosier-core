<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\MunicipioRepository")
 * @ORM\Table(name="bs_municipio")
 */
class Municipio extends EntityId
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
     * @ORM\Column(name="municipio_codigo", type="integer", nullable=false)
     * @Assert\NotBlank(message="O campo 'municipio_codigo' deve ser informado")
     * @Assert\Range(min = 0)
     */
    private $municipioCodigo;

    /**
     *
     * @ORM\Column(name="municipio_nome", type="string", nullable=true, length=200)
     */
    private $municipioNome;

    /**
     *
     * @ORM\Column(name="uf_nome", type="string", nullable=true, length=200)
     */
    private $ufNome;

    /**
     *
     * @ORM\Column(name="uf_sigla", type="string", nullable=true, length=2)
     */
    private $ufSigla;

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

    public function getMunicipioCodigo()
    {
        return $this->municipioCodigo;
    }

    public function setMunicipioCodigo($municipioCodigo)
    {
        $this->municipioCodigo = $municipioCodigo;
    }

    public function getMunicipioNome()
    {
        return $this->municipioNome;
    }

    public function setMunicipioNome($municipioNome)
    {
        $this->municipioNome = $municipioNome;
    }

    public function getUfNome()
    {
        return $this->ufNome;
    }

    public function setUfNome($ufNome)
    {
        $this->ufNome = $ufNome;
    }

    public function getUfSigla()
    {
        return $this->ufSigla;
    }

    public function setUfSigla($ufSigla)
    {
        $this->ufSigla = $ufSigla;
    }
}