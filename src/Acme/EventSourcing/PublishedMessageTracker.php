<?php


namespace Acme\EventSourcing;


interface PublishedMessageTracker
{
    /**
     * @param string $exchangeName
     * @return int
     */
    public function mostRecentPublishedMessageId($exchangeName);

    /**
     * @param string $exchangeName
     * @param StoredEvent $notification
     */
    public function trackMostRecentPublishedMessage($exchangeName, $notification);
}
