<?php


namespace Acme\EventSourcing;


class AggregateRoot
{

    private $recordedEvents = [];

    protected function recordApplyAndPublishThat(DomainEvent $domainEvent)
    {
        $this->recordThat($domainEvent);
        $this->applyThat($domainEvent);
        $this->publishThat($domainEvent);
    }

    protected function recordThat(DomainEvent $domainEvent)
    {
        $this->recordedEvents[] = $domainEvent;
    }

    protected function applyThat(DomainEvent $domainEvent)
    {
        $class = new \ReflectionClass($domainEvent);

        $modifier = 'apply' . $class->getShortName();
        $this->$modifier($domainEvent);
    }

    protected function publishThat(DomainEvent $domainEvent)
    {
        DomainEventPublisher::instance()->publish($domainEvent);
    }

    public function recordedEvents()
    {
        return $this->recordedEvents;
    }

    public function clearEvents()
    {
        $this->recordedEvents = [];
    }

}