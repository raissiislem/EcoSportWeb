<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\User;

#[ORM\Entity]
class Client
{

    #[ORM\Id]
        #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "clients")]
    #[ORM\JoinColumn(name: 'id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private User $id;

    #[ORM\Column(type: "boolean")]
    private bool $isTopMember;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getIsTopMember()
    {
        return $this->isTopMember;
    }

    public function setIsTopMember($value)
    {
        $this->isTopMember = $value;
    }
}
