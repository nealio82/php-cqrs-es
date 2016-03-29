<?php

namespace spec\Acme;

use Acme\Fault;
use Acme\FaultCode;
use Acme\SerialNumber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ComputerSpec extends ObjectBehavior
{
    function it_is_initializable(SerialNumber $serial_number)
    {
        $this->beConstructedWith($serial_number, new Fault(new FaultCode('E100'), 'No video output'));

        $this->shouldHaveType('Acme\Computer');
    }
}
