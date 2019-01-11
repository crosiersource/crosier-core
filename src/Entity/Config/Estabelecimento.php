<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entidade 'Estabelecimento'.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\EstabelecimentoRepository")
 * @ORM\Table(name="cfg_estabelecimento")
 */
class Estabelecimento extends EntityId
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
     * @ORM\Column(name="codigo", type="integer", nullable=false)
     * @Assert\NotNull(message="O campo 'Código' deve ser informado")
     */
    private $codigo;

    /**
     *
     * @ORM\Column(name="descricao", type="string", nullable=true, length=40)
     */
    private $descricao;

    /**
     *
     * @ORM\Column(name="concreto", type="boolean", nullable=false)
     * @Assert\NotNull(message = "O campo 'Concreto' deve ser informado")
     */
    private $concreto = false;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Config\Estabelecimento", cascade={"persist"})
     * @ORM\JoinColumn(name="pai_id", nullable=false)
     *
     */
    public $pai;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
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
    public function getConcreto()
    {
        return $this->concreto;
    }

    /**
     * @param mixed $concreto
     */
    public function setConcreto($concreto): void
    {
        $this->concreto = $concreto;
    }

    /**
     * @return mixed
     */
    public function getPai()
    {
        return $this->pai;
    }

    /**
     * @param mixed $pai
     */
    public function setPai($pai): void
    {
        $this->pai = $pai;
    }


}

