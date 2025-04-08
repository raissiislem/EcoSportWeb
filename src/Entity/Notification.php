<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\User;

#[ORM\Entity]
class Notification
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "notifications")]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private User $user_id;

    #[ORM\Column(type: "string", length: 255)]
    private string $title;

    #[ORM\Column(type: "string", length: 20)]
    private string $type;

    #[ORM\Column(type: "boolean")]
    private bool $onClicked;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($value)
    {
        $this->type = $value;
    }

    public function getOnClicked()
    {
        return $this->onClicked;
    }

    public function setOnClicked($value)
    {
        $this->onClicked = $value;
    }
}
