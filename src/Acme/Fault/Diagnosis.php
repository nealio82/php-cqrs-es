<?php

namespace Acme\Fault;

class Diagnosis
{

    private $diagnosis;

    public function __construct($diagnosis)
    {
        $this->diagnosis = $diagnosis;
    }

}
