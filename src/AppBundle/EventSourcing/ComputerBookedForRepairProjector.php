<?php

namespace AppBundle\EventSourcing;

use Acme\Computer\ComputerWasBookedForRepair;
use Acme\Repair\RepairJob;
use Doctrine\ORM\EntityManager;

class ComputerBookedForRepairProjector
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function onComputerWasBookedForRepair(ComputerWasBookedForRepair $event)
    {

        $repairJob = new RepairJob($event->computer());

        $this->entityManager->persist($repairJob);

        $this->entityManager->flush();

    }

}