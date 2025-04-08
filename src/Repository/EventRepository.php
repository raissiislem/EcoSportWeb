<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EventRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Event::class);
}

// Custom method to fetch all events (this is just an example)
public function findAllEvents(): array
{
return $this->findAll(); // This will fetch all events from the database
}
}
