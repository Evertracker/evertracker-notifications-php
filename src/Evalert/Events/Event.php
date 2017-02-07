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
use Evalert\Notifications\Notification;

/**
 * Class Event
 * @package Evalert\Events
 */
class Event
{
    /**
     * @var Notification
     */
    private $notification;

    /**
     * Event constructor.
     *
     * @param Notification $notification
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
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
        $watcherIds = $this->getEntityWatchers($entityId);

        // Foreach watcher, generate a notification
        foreach ($watcherIds as $watcherId) {
            $this->notification->createOrUpdate($entityId, $eventId, $watcherId, $timestamp);
        }
    }

    /**
     * @param mixed $entityId
     *
     * @return array
     */
    protected function getEntityWatchers($entityId)
    {
        return [];
    }
}
