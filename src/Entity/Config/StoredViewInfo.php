<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entidade 'StoredViewInfo'.
 * Armazena informações sobre estado das páginas.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\StoredViewInfoRepository")
 * @ORM\Table(name="cfg_stored_viewinfo")
 *
 * @author Carlos Eduardo Pauluk
 */
class StoredViewInfo extends EntityId
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
     * @ORM\Column(name="view_name", type="string", length=200)
     */
    private $viewName;

    /**
     *
     * @ORM\Column(name="viewInfo", type="blob")
     */
    private $viewInfo;

    /**
     *
     * @ORM\ManyToOne(targetEntity="CrosierSource\CrosierLibBaseBundle\Entity\Security\User", fetch="EAGER", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", nullable=false)
     *
     */
    public $user;

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
    public function getViewName()
    {
        return $this->viewName;
    }

    /**
     * @param mixed $viewName
     */
    public function setViewName($viewName): void
    {
        $this->viewName = $viewName;
    }

    /**
     * @return mixed
     */
    public function getViewInfo()
    {
        return $this->viewInfo;
    }

    /**
     * @param mixed $viewInfo
     */
    public function setViewInfo($viewInfo): void
    {
        $this->viewInfo = $viewInfo;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }


}