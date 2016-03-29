<?php

namespace spec\Acme;

use Acme\FaultCode;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FaultSpec extends ObjectBehavior
{

    function let($description)
    {
        $this->beConstructedWith(new FaultCode('E100'), $description);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Fault');
    }

    function it_has_a_fault_code()
    {
        $this->faultCode()->shouldNotBeNull();
    }

}
