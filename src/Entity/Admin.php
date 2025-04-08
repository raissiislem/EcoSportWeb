<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\User;

#[ORM\Entity]
class Admin
{

    #[ORM\Id]
        #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "admins")]
    #[ORM\JoinColumn(name: 'id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private User $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $position;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($value)
    {
        $this->position = $value;
    }
}
