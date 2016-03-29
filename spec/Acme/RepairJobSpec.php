<?php

namespace spec\Acme;

use Acme\Computer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepairJobSpec extends ObjectBehavior
{

    function let(Computer $computer)
    {
        $this->beConstructedWith($computer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\RepairJob');
    }

    function it_has_a_job_number()
    {
        $this->jobNumber()->shouldNotBeNull();
    }
}
