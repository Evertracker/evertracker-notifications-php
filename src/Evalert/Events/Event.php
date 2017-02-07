<?php

/*
 * This file is part of the Evalert package.
 *
 * (c) Evertracker GmbH <developers@evertracker.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Evalert\Events;

use DateTime;
use Evalert\Notifications\NotificationHandler;

/**
 * Class Event
 * @package Evalert\Events
 */
class Event
{
    /**
     * @var NotificationHandler
     */
    private $notificationHandler;

    /**
     * Event constructor.
     *
     * @param NotificationHandler $notificationHandler
     */
    public function __construct(NotificationHandler $notificationHandler)
    {
        $this->notificationHandler = $notificationHandler;
    }

    /**
     * @param int           $typeId
     * @param mixed         $entityId
     * @param DateTime|null $timestamp
     */
    public function create($typeId, $entityId, $timestamp = null)
    {
        // Create the event
        $eventId = null;

        // Get all entity watchers
        $watchers = [];

        // Foreach watcher, generate a notification
        foreach ($watchers as $watcherId) {
            $this->notificationHandler->createOrUpdate($entityId, $eventId, $watcherId);
        }
    }
}
