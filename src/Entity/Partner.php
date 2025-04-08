<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\User;

#[ORM\Entity]
class Partner
{

    #[ORM\Id]
        #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "partners")]
    #[ORM\JoinColumn(name: 'id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private User $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $organizationName;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getOrganizationName()
    {
        return $this->organizationName;
    }

    public function setOrganizationName($value)
    {
        $this->organizationName = $value;
    }
}
