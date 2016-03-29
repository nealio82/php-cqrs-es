<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SerialNumberSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('111111');

        $this->shouldHaveType('Acme\SerialNumber');
    }
}
