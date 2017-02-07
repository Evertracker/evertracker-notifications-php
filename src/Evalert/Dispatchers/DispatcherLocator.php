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

/**
 * Class DispatcherLocator
 * @package Evalert\Dispatchers
 */
class DispatcherLocator
{
    /**
     * Locate all dispatchers and return an array of fully qualified names or NotificationDispatcher(s)
     *
     * @return NotificationDispatcher[]
     */
    public function locate()
    {
        $registry = new DispatcherRegistry();

        return [
            new WampDispatcher($registry),
            new EmailDispatcher($registry),
            new SMSDispatcher($registry)
        ];
    }
}
