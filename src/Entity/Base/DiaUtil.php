<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entidade 'Dia Útil'.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\DiaUtilRepository")
 * @ORM\Table(name="bon_dia_util")
 */
class DiaUtil implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="dia", type="datetime", nullable=false)
     * @Assert\NotNull(message="O campo 'Dia' deve ser informado")
     * @Assert\Type("\DateTime")
     */
    private $dia;

    /**
     *
     * @ORM\Column(name="descricao", type="string", nullable=true, length=40)
     */
    private $descricao;

    /**
     *
     * @ORM\Column(name="comercial", type="boolean", nullable=false)
     * @Assert\NotNull(message = "O campo 'Comercial' deve ser informado")
     */
    private $comercial = false;

    /**
     *
     * @ORM\Column(name="financeiro", type="boolean", nullable=false)
     * @Assert\NotNull(message = "O campo 'Financeiro' deve ser informado")
     */
    private $financeiro = false;

    public function getDia()
    {
        return $this->dia;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getComercial()
    {
        return $this->comercial;
    }

    public function getFinanceiro()
    {
        return $this->financeiro;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDia($dia)
    {
        $this->dia = $dia;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setComercial($comercial)
    {
        $this->comercial = $comercial;
    }

    public function setFinanceiro($financeiro)
    {
        $this->financeiro = $financeiro;
    }
}

