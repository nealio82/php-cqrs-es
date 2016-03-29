<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FaultCodeSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith('E100');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\FaultCode');
    }
}
