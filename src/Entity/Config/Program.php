<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Doctrine\Annotations\NotUppercase;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\ProgramRepository")
 * @ORM\Table(name="cfg_program")
 * @author Carlos Eduardo Pauluk
 */
class Program implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="descricao", type="string", nullable=false, length=255)
     */
    private $descricao;

    /**
     * Sem o domínio.
     * @ORM\Column(name="url", type="string", nullable=true, length=2000)
     * @NotUppercase()
     */
    private $url;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Config\App")
     * @ORM\JoinColumn(nullable=false)
     */
    private $app;

    /**
     *
     * @ManyToMany(targetEntity="CrosierSource\CrosierLibBaseBundle\Entity\Security\Role")
     * @JoinTable(name="cfg_app_role",
     *      joinColumns={@JoinColumn(name="app_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="role_id", referencedColumnName="id")}
     *      )
     */
    private $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return App|null
     */
    public function getApp(): ?App
    {
        return $this->app;
    }

    /**
     * @param mixed $app
     */
    public function setApp(?App $app): void
    {
        $this->app = $app;
    }

    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function getRolesArray()
    {
        if ($this->roles) {
            $rolesArray = [];
            foreach ($this->roles as $role) {
                $rolesArray[] = $role->getRole();
            }
            return $rolesArray;
        }
        return null;
    }


}

