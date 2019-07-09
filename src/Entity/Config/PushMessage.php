<?php

namespace App\Entity\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;
use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Config\PushMessageRepository")
 * @ORM\Table(name="cfg_pushmessage")
 *
 * @author Carlos Eduardo Pauluk
 */
class PushMessage implements EntityId
{

    use EntityIdTrait;


    /**
     *
     * @ORM\Column(name="mensagem", type="string", nullable=false, length=200)
     * @Groups("entity")
     *
     * @var null|string
     */
    private $mensagem;

    /**
     *
     * @ORM\Column(name="url", type="string", nullable=true, length=2000)
     * @Groups("entity")
     *
     * @var null|string
     */
    private $url;


    /**
     * @ORM\Column(name="user_destinatario_id", type="bigint", nullable=false)
     * @Groups("entity")
     *
     * @var null|integer
     */
    private $userDestinatarioId;

    /**
     *
     * @ORM\Column(name="dt_envio", type="datetime", nullable=false)
     * @Groups("entity")
     *
     * @var null|\DateTime
     */
    private $dtEnvio;

    /**
     *
     * @ORM\Column(name="dt_notif", type="datetime", nullable=true)
     * @Groups("entity")
     *
     * @var null|\DateTime
     */
    private $dtNotif;

    /**
     *
     * @ORM\Column(name="dt_abert", type="datetime", nullable=true)
     * @Groups("entity")
     *
     * @var null|\DateTime
     */
    private $dtAbert;

    /**
     *
     * @ORM\Column(name="params", type="string", nullable=true, length=5000)
     * @Groups("entity")
     *
     * @var null|string
     */
    private $params;

    /**
     * @return string|null
     */
    public function getMensagem(): ?string
    {
        return $this->mensagem;
    }

    /**
     * @param string|null $mensagem
     * @return PushMessage
     */
    public function setMensagem(?string $mensagem): PushMessage
    {
        $this->mensagem = $mensagem;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return PushMessage
     */
    public function setUrl(?string $url): PushMessage
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserDestinatarioId(): ?int
    {
        return $this->userDestinatarioId;
    }

    /**
     * @param int|null $userDestinatarioId
     * @return PushMessage
     */
    public function setUserDestinatarioId(?int $userDestinatarioId): PushMessage
    {
        $this->userDestinatarioId = $userDestinatarioId;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDtEnvio(): ?\DateTime
    {
        return $this->dtEnvio;
    }

    /**
     * @param \DateTime|null $dtEnvio
     * @return PushMessage
     */
    public function setDtEnvio(?\DateTime $dtEnvio): PushMessage
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDtNotif(): ?\DateTime
    {
        return $this->dtNotif;
    }

    /**
     * @param \DateTime|null $dtNotif
     * @return PushMessage
     */
    public function setDtNotif(?\DateTime $dtNotif): PushMessage
    {
        $this->dtNotif = $dtNotif;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDtAbert(): ?\DateTime
    {
        return $this->dtAbert;
    }

    /**
     * @param \DateTime|null $dtAbert
     * @return PushMessage
     */
    public function setDtAbert(?\DateTime $dtAbert): PushMessage
    {
        $this->dtAbert = $dtAbert;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getParams(): ?string
    {
        return $this->params;
    }

    /**
     * @param string|null $params
     * @return PushMessage
     */
    public function setParams(?string $params): PushMessage
    {
        $this->params = $params;
        return $this;
    }


}