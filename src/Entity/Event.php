<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use App\Entity\Reclamation;

#[ORM\Entity]
class Event
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $title;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(name: "startDate", type: "date")]
    private \DateTimeInterface $startDate;

    #[ORM\Column(name: "endDate", type: "date")]
    private \DateTimeInterface $endDate;


    #[ORM\Column(type: "string", length: 255)]
    private string $location;

    #[ORM\Column(type: "string", length: 255)]
    private string $image;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate($value)
    {
        $this->startDate = $value;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate($value)
    {
        $this->endDate = $value;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($value)
    {
        $this->location = $value;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($value)
    {
        $this->image = $value;
    }

    #[ORM\OneToMany(mappedBy: "eventId", targetEntity: Participant::class)]
    private Collection $participants;

        public function getParticipants(): Collection
        {
            return $this->participants;
        }

        public function addParticipant(Participant $participant): self
        {
            if (!$this->participants->contains($participant)) {
                $this->participants[] = $participant;
                $participant->setEventId($this);
            }

            return $this;
        }

        public function removeParticipant(Participant $participant): self
        {
            if ($this->participants->removeElement($participant)) {
                // set the owning side to null (unless already changed)
                if ($participant->getEventId() === $this) {
                    $participant->setEventId(null);
                }
            }

            return $this;
        }

    #[ORM\OneToMany(mappedBy: "event_id", targetEntity: Reclamation::class)]
    private Collection $reclamations;

        public function getReclamations(): Collection
        {
            return $this->reclamations;
        }

        public function addReclamation(Reclamation $reclamation): self
        {
            if (!$this->reclamations->contains($reclamation)) {
                $this->reclamations[] = $reclamation;
                $reclamation->setEvent_id($this);
            }

            return $this;
        }

        public function removeReclamation(Reclamation $reclamation): self
        {
            if ($this->reclamations->removeElement($reclamation)) {
                // set the owning side to null (unless already changed)
                if ($reclamation->getEvent_id() === $this) {
                    $reclamation->setEvent_id(null);
                }
            }

            return $this;
        }
}
