<?php


namespace AppBundle\EventSourcing;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

use JMS\Serializer\SerializerBuilder;

class RepairProjectorListener implements ConsumerInterface
{
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

        var_dump($eventStream);

    }

}