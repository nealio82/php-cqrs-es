<?php

namespace Acme\Fault;

use JMS\Serializer\Annotation\Type;

class Fault
{

    /**
     * @var FaultCode
     * @Type("Acme\Fault\FaultCode")
     */
    private $fault_code;

    /**
     * @var
     * @Type("string")
     */
    private $fault_description;
    private $diagnosis;

    /**
     * @var bool
     * @Type("boolean")
     */
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

    public function description()
    {
        return $this->fault_description;
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
