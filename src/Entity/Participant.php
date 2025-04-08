<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Event;

#[ORM\Entity]
class Participant
{

    #[ORM\Id]
        #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "participants")]
    #[ORM\JoinColumn(name: 'participantId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private User $participantId;

    #[ORM\Id]
        #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: "participants")]
    #[ORM\JoinColumn(name: 'eventId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Event $eventId;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $registrationDate;

    public function getParticipantId()
    {
        return $this->participantId;
    }

    public function setParticipantId($value)
    {
        $this->participantId = $value;
    }

    public function getEventId()
    {
        return $this->eventId;
    }

    public function setEventId($value)
    {
        $this->eventId = $value;
    }

    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate($value)
    {
        $this->registrationDate = $value;
    }
}
