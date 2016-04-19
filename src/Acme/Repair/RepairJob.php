<?php

namespace Acme\Repair;

use Acme\Computer\Computer;

class RepairJob
{
    private $computer;
    private $job_number = null;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
        $this->job_number = crc32(time() . $computer->serialNumber());
    }

    public function jobNumber()
    {
        return $this->job_number;
    }

    public function computer()
    {
        return $this->computer;
    }

}
