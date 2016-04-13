<?php

namespace spec\Acme\Fault;

use Acme\Fault\Diagnosis;
use Acme\Fault\FaultCode;
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
        $this->shouldHaveType('Acme\Fault\Fault');
    }

    function it_has_a_fault_code()
    {
        $this->faultCode()->shouldNotBeNull();
    }

    function it_can_be_diagnosed()
    {

        $this->diagnose(new Diagnosis("Faulty Video Card"));

        $this->diagnosed()->shouldBe(true);
    }

    function it_can_be_repaired()
    {
        $this->repair();

        $this->repaired()->shouldBe(true);
    }

}
