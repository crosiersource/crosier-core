<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entidade 'Categoria de Relacionamento Comercial'.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\CategoriaPessoaRepository")
 * @ORM\Table(name="bse_categ_pessoa")
 * @author Carlos Eduardo Pauluk
 */
class CategoriaPessoa implements EntityId
{

    use EntityIdTrait;

    /**
     *
     *
     * @ORM\Column(name="descricao", type="string", nullable=false, length=100)
     * @var null|string
     */
    private $descricao;

    /**
     * @return null|string
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    /**
     * @param null|string $descricao
     */
    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }


}

