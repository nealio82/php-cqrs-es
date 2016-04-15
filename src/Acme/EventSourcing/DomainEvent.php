<?php

namespace Acme\EventSourcing;

interface DomainEvent
{
    /**
     * @return \DateTime
     */
    public function occurredOn();
}