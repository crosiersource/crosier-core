<?php

namespace App\Entity\Security;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entidade 'Role'.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Security\RoleRepository")
 * @ORM\Table(name="sec_role")
 */
class Role extends EntityId
{

    /**
     *
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\Column(name="role", type="string", length=90, unique=true)
     */
    private $role;

    /**
     *
     * @ORM\Column(name="descricao", type="string", length=90)
     */
    private $descricao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


}

