<?php

namespace Acme\Computer;

use JMS\Serializer\Annotation\Type;

class SerialNumber
{

    /**
     * @var
     * @Type("string")
     */
    private $serial_number;

    public function __construct($serial_number)
    {
        $this->serial_number = $serial_number;
    }

    public function __toString()
    {
        return $this->serialNumber();
    }

    public function serialNumber()
    {
        return $this->serial_number;
    }

}
