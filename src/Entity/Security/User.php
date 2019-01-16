<?php

namespace App\Entity\Security;

use CrosierSource\CrosierLibBaseBundle\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Entidade 'User'.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Security\UserRepository")
 * @ORM\Table(name="sec_user")
 */
class User extends EntityId implements UserInterface, \Serializable
{

    /**
     *
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @NotUppercase()
     * @ORM\Column(name="username", type="string", length=90, unique=true)
     */
    private $username;

    /**
     * @NotUppercase()
     * @ORM\Column(name="password", type="string", length=90)
     */
    private $password;

    /**
     * @NotUppercase()
     * @ORM\Column(name="email", type="string", length=90, unique=true)
     */
    private $email;

    /**
     *
     * @ORM\Column(name="nome", type="string", length=90, unique=true)
     */
    private $nome;

    /**
     *
     * @ORM\Column(name="ativo", type="boolean")
     */
    private $isActive;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Security\Group")
     * @ORM\JoinColumn(name="group_id", nullable=false)
     *
     * @var $group Group
     */
    private $group;

    /**
     * Renomeei o atributo para poder funcionar corretamente com o security do Symfony.
     *
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="sec_user_role",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     *      )
     */
    private $userRoles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function setGroup(?Group $group)
    {
        $this->group = $group;
    }

    /**
     *
     * @return Collection|Role[]
     *
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }


    public function getRoles()
    {
        $roles = array();
        foreach ($this->userRoles as $role) {
            $roles[] = $role->getRole();
        }
        return $roles;
    }

    public function setUserRoles($userRoles)
    {
        $this->roles = $userRoles;
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password
        ));
    }

    public function unserialize($serialized)
    {
        list ($this->id, $this->username, $this->password) = unserialize($serialized, [
            'allowed_classes' => false
        ]);
    }

    public function eraseCredentials()
    {
    }

    public function getSalt()
    {
        return null;
    }
}

