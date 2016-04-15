<?php

namespace Acme\Computer;

use Acme\EventSourcing\AggregateRoot;

use Acme\Fault\Fault;

class Computer extends AggregateRoot
{

    private $serial_number;
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
        return $this->serial_number->serialNumber();
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
