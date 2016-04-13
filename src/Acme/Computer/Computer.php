<?php

namespace Acme\Computer;

use Acme\Fault\Fault;

class Computer
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

}
