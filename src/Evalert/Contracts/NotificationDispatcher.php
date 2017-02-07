<?php

/*
 * This file is part of the Evalert package.
 *
 * (c) Evertracker GmbH <developers@evertracker.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Evalert\Contracts;

use Evalert\Notifications\Message;
use Exception;

/**
 * Interface NotificationDispatcher
 * @package Evalert\Contracts
 */
interface NotificationDispatcher
{
    /**
     * Register the dispatcher to the registry
     */
    public function register();

    /**
     * Check if the dispatcher is enabled for the given user.
     *
     * @param mixed $recipientId
     *
     * @return bool
     */
    public function isEnabled($recipientId);

    /**
     * Dispatch the notification message to the recipient
     *
     * @param Message $message
     * @param mixed   $recipientId
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function dispatch($message, $recipientId);
}
