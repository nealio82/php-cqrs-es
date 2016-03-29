<?php

namespace Acme;

class FaultCode
{

    private $code = null;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function code()
    {
        return $this->code;
    }

}
