<?php

namespace Acme\Repair;

use Acme\Computer\Computer;

class RepairJob
{
    private $computer;
    private $jobNumber = null;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
        $this->jobNumber = time();
    }

    public function jobNumber()
    {
        return $this->jobNumber;
    }

}
