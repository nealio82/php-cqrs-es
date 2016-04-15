<?php


namespace AppBundle\EventSourcing;

use Acme\EventSourcing\PublishedMessageTracker;
use Doctrine\ORM\EntityRepository;
use Acme\EventSourcing\PublishedMessage;

class DoctrinePublishedMessageTracker extends EntityRepository implements PublishedMessageTracker
{
    /**
     * @param $exchangeName
     * @return int
     */
    public function mostRecentPublishedMessageId($exchangeName)
    {
        $messageTracked = $this->findOneByExchangeName($exchangeName);
        if (!$messageTracked) {
            return null;
        }
        return $messageTracked->mostRecentPublishedMessageId();
    }

    /**
     * @param $exchangeName
     * @param StoredEvent $notification
     */
    public function trackMostRecentPublishedMessage($exchangeName, $notification)
    {
        if (!$notification) {
            return;
        }
        $maxId = $notification->eventId();
        $publishedMessage = $this->findOneByExchangeName($exchangeName);
        if (null === $publishedMessage) {
            $publishedMessage = new PublishedMessage($exchangeName,
                $maxId
            );
        }
        $publishedMessage->updateMostRecentPublishedMessageId($maxId);
        $this->getEntityManager()->persist($publishedMessage);
        $this->getEntityManager()->flush($publishedMessage);
    }
}