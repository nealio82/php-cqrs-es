<?php

namespace Acme;

class Repair
{

    private $repair_job;

    public function __construct(RepairJob $repair_job)
    {
        $this->repair_job = $repair_job;
    }
}
