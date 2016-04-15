<?php


namespace Acme\EventSourcing;

class PersistDomainEventSubscriber implements DomainEventSubscriber
{
    private $eventStore;

    public function __construct(EventStore $anEventStore)
    {
        $this->eventStore = $anEventStore;
    }

    public function handle($aDomainEvent)
    {
        $this->eventStore->append($aDomainEvent);
    }

    public function isSubscribedTo($aDomainEvent)
    {
        return true;
    }
}