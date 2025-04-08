<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use App\Entity\Equipement;

#[ORM\Entity]
class Category
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    #[ORM\Column(type: "string", length: 255)]
    private string $icon;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon($value)
    {
        $this->icon = $value;
    }

    #[ORM\OneToMany(mappedBy: "categoryId", targetEntity: Equipement::class)]
    private Collection $equipements;

        public function getEquipements(): Collection
        {
            return $this->equipements;
        }
    
        public function addEquipement(Equipement $equipement): self
        {
            if (!$this->equipements->contains($equipement)) {
                $this->equipements[] = $equipement;
                $equipement->setCategoryId($this);
            }
    
            return $this;
        }
    
        public function removeEquipement(Equipement $equipement): self
        {
            if ($this->equipements->removeElement($equipement)) {
                // set the owning side to null (unless already changed)
                if ($equipement->getCategoryId() === $this) {
                    $equipement->setCategoryId(null);
                }
            }
    
            return $this;
        }
}
