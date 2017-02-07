<?php

/*
 * This file is part of the Evalert package.
 *
 * (c) Evertracker GmbH <developers@evertracker.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Evalert\Notifications;

use DateTime;
use Evalert\Dispatchers\DispatcherRegistry;

/**
 * Class Notification
 * @package Evalert\Notifications
 */
class Notification
{
    /**
     * @var DispatcherRegistry
     */
    private $registry;

    /**
     * NotificationHandler constructor.
     *
     * @param DispatcherRegistry $registry
     */
    public function __construct(DispatcherRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param mixed         $entityId
     * @param int           $eventId
     * @param int           $receiverId
     * @param DateTime|null $timestamp
     *
     * @return bool
     */
    public function create($entityId, $eventId, $receiverId, $timestamp = null)
    {
        // todo: create a notification

        // Dispatch the notification to the user
        $this->dispatch($receiverId);

        return true;
    }

    /**
     * @param mixed         $entityId
     * @param int           $eventId
     * @param int           $receiverId
     * @param DateTime|null $timestamp
     *
     * @return bool
     */
    public function update($entityId, $eventId, $receiverId, $timestamp = null)
    {
        // todo: update the notification

        // Dispatch the notification update to the user
        $this->dispatch($receiverId);

        return true;
    }

    /**
     * @param mixed         $entityId
     * @param int           $eventId
     * @param int           $receiverId
     * @param DateTime|null $timestamp
     *
     * @return bool
     */
    public function createOrUpdate($entityId, $eventId, $receiverId, $timestamp = null)
    {
        // todo: check whether to create or update the notification
        $update = false;
        if ($update) {
            return $this->update($entityId, $eventId, $receiverId, $timestamp);
        }

        return $this->create($entityId, $eventId, $receiverId, $timestamp);
    }

    /**
     * @param mixed $recipient
     */
    protected function dispatch($recipient)
    {
        // Generate notification message
        $message = $this->getMessage();

        // Send to all dispatchers
        $dispatchers = $this->registry->getDispatchers();
        foreach ($dispatchers as $dispatcher) {
            if ($dispatcher->isEnabled($recipient)) {
                $dispatcher->dispatch($message, $recipient);
            }
        }
    }

    /**
     * @return Message
     */
    protected function getMessage()
    {
        return new Message();
    }
}
