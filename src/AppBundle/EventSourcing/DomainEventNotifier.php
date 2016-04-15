<?php


namespace AppBundle\EventSourcing;

use Acme\EventSourcing\NotificationService;
use Doctrine\ORM\EntityManager;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Acme\EventSourcing\StoredEvent;
use Acme\EventSourcing\PublishedMessage;


class DomainEventNotifier
{

    /**
     * @var EntityManager
     */
    private $manager;

    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    public function getNotifier()
    {

        $event_repository = $this->manager->getRepository(StoredEvent::class);
        $message_repository = $this->manager->getRepository(PublishedMessage::class);

        $message_producer = new RabbitMqMessageProducer(
            new AMQPStreamConnection(
                'localhost',
                5672,
                'phpcqrses',
                'phpcqrses',
                '/'
            )
        );

        return new NotificationService($event_repository, $message_repository, $message_producer);

    }

}