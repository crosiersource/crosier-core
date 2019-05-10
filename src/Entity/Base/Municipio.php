<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\MunicipioRepository")
 * @ORM\Table(name="bse_municipio")
 * @author Carlos Eduardo Pauluk
 */
class Municipio implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="municipio_codigo", type="integer", nullable=false)
     * @Groups("entity")
     */
    private $municipioCodigo;

    /**
     *
     * @ORM\Column(name="municipio_nome", type="string", nullable=true, length=200)
     * @Groups("entity")
     */
    private $municipioNome;

    /**
     *
     * @ORM\Column(name="uf_nome", type="string", nullable=true, length=200)
     * @Groups("entity")
     */
    private $ufNome;

    /**
     *
     * @ORM\Column(name="uf_sigla", type="string", nullable=true, length=2)
     * @Groups("entity")
     */
    private $ufSigla;

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