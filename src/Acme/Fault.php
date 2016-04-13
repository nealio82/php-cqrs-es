<?php

namespace Acme;

class Fault
{

    private $fault_code;
    private $fault_description;
    private $diagnosis;
    private $is_repaired;

    public function __construct(FaultCode $fault_code, $fault_description)
    {
        $this->fault_code = $fault_code;
        $this->fault_description = $fault_description;
        $this->is_repaired = false;
    }

    public function faultCode()
    {
        return $this->fault_code->code();
    }

    public function diagnose(Diagnosis $diagnosis)
    {
        $this->diagnosis = $diagnosis;
    }

    public function diagnosed()
    {
        return !is_null($this->diagnosis);
    }

    public function repair()
    {
        $this->is_repaired = true;
    }

    public function repaired()
    {
        return $this->is_repaired;
    }

}
