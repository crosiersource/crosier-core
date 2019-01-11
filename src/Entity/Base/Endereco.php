<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\EnderecoRepository")
 * @ORM\Table(name="bon_endereco")
 */
class Endereco extends EntityId
{

    public function __construct()
    {
        ORM\Annotation::class;
        Assert\All::class;
    }

    /**
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     *
     * @ORM\Column(name="bairro", type="string", nullable=true, length=120)
     */
    private $bairro;

    /**
     *
     * @ORM\Column(name="cep", type="string", nullable=true, length=9)
     */
    private $cep;

    /**
     *
     * @ORM\Column(name="cidade", type="string", nullable=true, length=80)
     */
    private $cidade;

    /**
     *
     * @ORM\Column(name="complemento", type="string", nullable=true, length=120)
     */
    private $complemento;

    /**
     *
     * @ORM\Column(name="estado", type="string", nullable=true, length=2)
     */
    private $estado;

    /**
     *
     * @ORM\Column(name="logradouro", type="string", nullable=true, length=120)
     */
    private $logradouro;

    /**
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     * @Assert\Range(min = 0)
     */
    private $numero;

    /**
     *
     * @ORM\Column(name="tipoEndereco", type="string", nullable=false, length=100)
     * @Assert\NotBlank(message="O campo 'tipoEndereco' deve ser informado")
     */
    private $tipoEndereco;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getTipoEndereco()
    {
        return $this->tipoEndereco;
    }

    public function setTipoEndereco($tipoEndereco)
    {
        $this->tipoEndereco = $tipoEndereco;
    }

    public function getEnderecoCompleto()
    {
        $enderecoCompleto = "";
        $enderecoCompleto .= $this->getLogradouro() . ", " . $this->getNumero();
        if ($this->getComplemento()) {
            $enderecoCompleto .= " (" . $this->getComplemento() . ")";
        }
        if ($this->getBairro()) {
            $enderecoCompleto .= " (" . $this->getBairro() . ")";
        }
        return $enderecoCompleto;
    }
}