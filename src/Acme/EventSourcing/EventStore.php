<?php


namespace Acme\EventSourcing;


interface EventStore
{
    public function append(DomainEvent $aDomainEvent);

    public function allStoredEventsSince($anEventId);
}
