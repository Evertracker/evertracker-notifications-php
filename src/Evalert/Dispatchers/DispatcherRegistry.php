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
use InvalidArgumentException;
use LogicException;

/**
 * Class DispatcherRegistry
 * @package Evalert\Dispatchers
 */
class DispatcherRegistry
{
    /**
     * All the registered dispatchers in the registry
     *
     * @var NotificationDispatcher[]
     */
    protected $dispatchers;

    /**
     * Register a dispatcher to the registry
     *
     * @param NotificationDispatcher $dispatcher
     */
    public function register(NotificationDispatcher $dispatcher)
    {
        // Check arguments
        if (empty($dispatcher) || !($dispatcher instanceof NotificationDispatcher)) {
            throw new InvalidArgumentException('The given dispatcher is invalid.');
        }

        $this->pushDispatcher($dispatcher);
    }

    /**
     * Pushes a dispatcher on to the stack.
     *
     * @param NotificationDispatcher $dispatcher
     *
     * @return $this
     */
    public function pushDispatcher(NotificationDispatcher $dispatcher)
    {
        $this->dispatchers[] = $dispatcher;

        return $this;
    }

    /**
     * Pops a dispatcher from the stack
     *
     * @return NotificationDispatcher
     */
    public function popDispatcher()
    {
        if (empty($this->dispatchers)) {
            throw new LogicException('You tried to pop from an empty handler stack.');
        }

        return array_shift($this->dispatchers);
    }

    /**
     * @param NotificationDispatcher[] $dispatchers
     *
     * @return $this
     */
    public function setDispatchers(array $dispatchers)
    {
        $this->dispatchers = $dispatchers;

        return $this;
    }

    /**
     * @return NotificationDispatcher[]
     */
    public function getDispatchers()
    {
        return $this->dispatchers;
    }
}
