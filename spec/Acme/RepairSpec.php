<?php

namespace spec\Acme;

use Acme\RepairJob;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepairSpec extends ObjectBehavior
{
    function it_is_initializable(RepairJob $repair_job)
    {

        $this->beConstructedWith($repair_job);

        $this->shouldHaveType('Acme\Repair');
    }
}
