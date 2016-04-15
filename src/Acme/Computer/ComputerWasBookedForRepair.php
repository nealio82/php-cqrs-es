<?php

namespace Acme\Computer;

use Acme\EventSourcing\DomainEvent;

class ComputerWasBookedForRepair implements DomainEvent
{

    private $computer;
    private $occurred_on;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
        $this->occurred_on = new \DateTime();
    }

    public function computer()
    {
        return $this->computer;
    }

    public function occurredOn()
    {
        return $this->occurred_on;
    }

    public function serialNumber()
    {
        return $this->computer->serialNumber();
    }

}