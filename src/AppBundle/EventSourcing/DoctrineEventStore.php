<?php


namespace AppBundle\EventSourcing;

use Doctrine\ORM\EntityRepository;
use Acme\EventSourcing\EventStore;
use Acme\EventSourcing\DomainEvent;
use JMS\Serializer\SerializerBuilder;
use Acme\EventSourcing\StoredEvent;


class DoctrineEventStore extends EntityRepository implements EventStore
{
    private $serializer;

    public function append(DomainEvent $aDomainEvent)
    {
        $storedEvent = new StoredEvent(get_class($aDomainEvent), $aDomainEvent->occurredOn(), $this->serializer()->serialize($aDomainEvent, 'json')
        );
        $this->getEntityManager()->persist($storedEvent);

        $this->getEntityManager()->flush();
    }

    public function allStoredEventsSince($anEventId)
    {
        $query = $this->createQueryBuilder('e');
        if ($anEventId) {
            $query->where('e.eventId > :eventId');
            $query->setParameters(['eventId' => $anEventId]);
        }
        $query->orderBy('e.eventId');

        return $query->getQuery()->getResult();
    }

    private function serializer()
    {
        if (null === $this->serializer) {
            $this->serializer = SerializerBuilder::create()->build();
        }
        return $this->serializer;
    }
}