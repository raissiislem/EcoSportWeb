<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Category;

#[ORM\Entity]
class Equipement
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $name;

    #[ORM\Column(type: "text")]
    private string $description;

        #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: "equipements")]
    #[ORM\JoinColumn(name: 'categoryId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Category $categoryId;

    #[ORM\Column(type: "float")]
    private float $price;

    #[ORM\Column(type: "string", length: 255)]
    private string $image;

    #[ORM\Column(type: "boolean")]
    private bool $availability;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $dateAdded;

    #[ORM\Column(type: "integer")]
    private int $partnerId;

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

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($value)
    {
        $this->categoryId = $value;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($value)
    {
        $this->price = $value;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($value)
    {
        $this->image = $value;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    public function setAvailability($value)
    {
        $this->availability = $value;
    }

    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    public function setDateAdded($value)
    {
        $this->dateAdded = $value;
    }

    public function getPartnerId()
    {
        return $this->partnerId;
    }

    public function setPartnerId($value)
    {
        $this->partnerId = $value;
    }
}
