<?php

/*
 * This file is part of the Evalert package.
 *
 * (c) Evertracker GmbH <developers@evertracker.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Evalert\Dispatchers;

use Evalert\Contracts\NotificationDispatcher;
use Evalert\Notifications\Message;
use Exception;

/**
 * Class SMSDispatcher
 * @package Evalert\Dispatchers
 */
class SMSDispatcher extends AbstractDispatcher implements NotificationDispatcher
{
    const __IDENTIFIER = 'SMS';

    /**
     * @return mixed
     */
    public function getDispatcherIdentifier()
    {
        return self::__IDENTIFIER;
    }

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
    public function dispatch($message, $recipientId)
    {
        // TODO: Implement dispatch() method.

        return true;
    }
}
