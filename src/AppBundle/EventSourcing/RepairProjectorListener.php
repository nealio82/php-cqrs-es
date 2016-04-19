<?php


namespace AppBundle\EventSourcing;

use Acme\Repair\RepairJob;
use Doctrine\ORM\EntityManager;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

use JMS\Serializer\SerializerBuilder;

class RepairProjectorListener implements ConsumerInterface
{

    /**
     * @var EntityManager
     */
    private $manager;

    public function __construct(EntityManager $manager)
    {

        $this->manager = $manager;
    }

    public function execute(AMQPMessage $message)
    {

        $serializer = SerializerBuilder::create()->build();

        $eventData = $serializer->deserialize(
            $message->body,
            'array',
            'json'
        );

        $eventStream[] = $serializer->deserialize(
            $eventData['event_body'],
            $eventData['type_name'],
            'json'
        );

        foreach ($eventStream AS $computerBookedIn) {

            $repair = new RepairJob($computerBookedIn->computer());

            var_dump($repair);

            $this->manager->persist($repair);
            $this->manager->flush();

        }


    }

}