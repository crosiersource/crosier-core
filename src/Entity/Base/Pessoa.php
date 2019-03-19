<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Entidade 'Pessoa'.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\PessoaRepository")
 * @ORM\Table(name="bse_pessoa")
 * @author Carlos Eduardo Pauluk
 */
class Pessoa implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * Para Pessoa Jurídica é a Razão Social.
     *
     * @ORM\Column(name="nome", type="string", nullable=false, length=300)
     * @var null|string
     * @Groups("entity")
     */
    private $nome;

    /**
     * @return null|string
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param null|string $nome
     */
    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }


}

