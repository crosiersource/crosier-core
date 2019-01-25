<?php

namespace App\Entity\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Base\EstadoRepository")
 * @ORM\Table(name="bs_uf")
 */
class Estado implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="nome", type="string", nullable=false, length=50)
     * @Assert\NotBlank(message="O campo 'nome' deve ser informado")
     */
    private $nome;

    /**
     *
     * @ORM\Column(name="sigla", type="string", nullable=false, length=2)
     * @Assert\NotBlank(message="O campo 'sigla' deve ser informado")
     */
    private $sigla;

    /**
     *
     * @ORM\Column(name="codigoIBGE", type="integer", nullable=false)
     * @Assert\NotBlank(message="O campo 'codigoIBGE' deve ser informado")
     * @Assert\Range(min = 0)
     */
    private $codigoIBGE;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }

    public function getCodigoIBGE()
    {
        return $this->codigoIBGE;
    }

    public function setCodigoIBGE($codigoIBGE)
    {
        $this->codigoIBGE = $codigoIBGE;
    }
}