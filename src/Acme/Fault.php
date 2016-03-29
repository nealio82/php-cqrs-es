<?php

namespace Acme;

class Fault
{

    private $fault_code;
    private $fault_description;

    public function __construct(FaultCode $fault_code, $fault_description)
    {
        $this->fault_code = $fault_code;
        $this->fault_description = $fault_description;
    }

    public function faultCode()
    {
        return $this->fault_code->code();
    }
}
