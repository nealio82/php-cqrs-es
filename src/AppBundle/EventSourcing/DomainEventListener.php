<?php


namespace AppBundle\EventSourcing;

use Acme\EventSourcing\DomainEventPublisher;
use Acme\EventSourcing\PersistDomainEventSubscriber;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Acme\EventSourcing\StoredEvent;


class DomainEventListener
{

    /**
     * @var EntityManager
     */
    private $manager;

    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $repository = $this->manager->getRepository(StoredEvent::class);

        DomainEventPublisher::instance()->subscribe(new PersistDomainEventSubscriber($repository));
    }

}