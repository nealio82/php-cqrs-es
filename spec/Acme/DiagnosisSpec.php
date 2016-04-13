<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DiagnosisSpec extends ObjectBehavior
{
    function it_is_initializable()
    {

        $this->beConstructedWith("Faulty video card");

        $this->shouldHaveType('Acme\Diagnosis');
    }
}
