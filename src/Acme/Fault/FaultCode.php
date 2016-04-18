<?php

namespace Acme\Fault;

use JMS\Serializer\Annotation\Type;

class FaultCode
{

    /**
     * @var null
     * @Type("string")
     */
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
