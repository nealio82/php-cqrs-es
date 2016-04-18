<?php

namespace Acme\Computer;

use Acme\EventSourcing\AggregateRoot;

use Acme\Fault\Fault;

use JMS\Serializer\Annotation\Type;

class Computer extends AggregateRoot
{

    /**
     * @var SerialNumber
     * @Type("Acme\Computer\SerialNumber")
     */
    private $serial_number;

    /**
     * @var Fault
     * @Type("Acme\Fault\Fault")
     */
    private $fault;

    public function __construct(SerialNumber $serial_number, Fault $fault)
    {
        $this->serial_number = $serial_number;
        $this->fault = $fault;
    }

    public function isFaulty()
    {
        return !$this->fault->repaired();
    }

    public function fault()
    {
        return $this->fault;
    }

    public function serialNumber()
    {
        return $this->serial_number;
    }

    public function bookForRepair()
    {
        $this->recordApplyAndPublishThat(new ComputerWasBookedForRepair($this));
    }

    protected function applyComputerWasBookedForRepair(ComputerWasBookedForRepair $event)
    {
        $this->serial_number = $event->serialNumber();
    }

}
