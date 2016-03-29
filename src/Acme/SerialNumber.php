<?php

namespace Acme;

class SerialNumber
{

    private $serial_number;

    public function __construct($serial_number)
    {
        $this->serial_number = $serial_number;
    }

    public function serialNumber()
    {
        return $this->serial_number;
    }

}
