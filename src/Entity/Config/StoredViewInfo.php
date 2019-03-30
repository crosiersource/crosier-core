<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
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
class StoredViewInfo implements EntityId
{

    use EntityIdTrait;

    /**
     *
     * @ORM\Column(name="view_name", type="string", length=300, nullable=true)
     */
    private $viewName;

    /**
     *
     * @ORM\Column(name="view_info", type="string", length=15000, nullable=true)
     */
    private $viewInfo;

    /**
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     *
     */
    public $user;

    /**
     * @return mixed
     */
    public function getViewName()
    {
        return $this->viewName;
    }

    /**
     * @param mixed $viewName
     * @return StoredViewInfo
     */
    public function setViewName($viewName)
    {
        $this->viewName = $viewName;
        return $this;
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
     * @return StoredViewInfo
     */
    public function setViewInfo($viewInfo)
    {
        $this->viewInfo = $viewInfo;
        return $this;
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
     * @return StoredViewInfo
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

}