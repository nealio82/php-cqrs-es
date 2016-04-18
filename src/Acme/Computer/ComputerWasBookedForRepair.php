<?php

namespace Acme\Computer;

use Acme\EventSourcing\DomainEvent;

use JMS\Serializer\Annotation\Type;

class ComputerWasBookedForRepair implements DomainEvent
{

    /**
     * @var Computer
     * @Type("Acme\Computer\Computer")
     */
    private $computer;

    /**
     * @var \DateTime
     * @Type("DateTime")
     */
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