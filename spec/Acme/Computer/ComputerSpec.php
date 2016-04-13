<?php

namespace spec\Acme\Computer;

use Acme\Fault\Fault;
use Acme\Fault\FaultCode;
use Acme\Computer\SerialNumber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ComputerSpec extends ObjectBehavior
{

    function let(SerialNumber $serial_number)
    {
        $fault = new Fault(new FaultCode('E100'), 'No video output');

        $this->beConstructedWith($serial_number, $fault);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Computer\Computer');
    }

    function it_is_faulty()
    {
        $this->isFaulty()->shouldBe(true);
    }

    function it_is_not_faulty_after_repair()
    {
        $this->fault()->repair();

        $this->isFaulty()->shouldBe(false);

    }
}
