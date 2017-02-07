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
 * Class AbstractDispatcher
 * @package Evalert\Dispatchers
 */
abstract class AbstractDispatcher implements NotificationDispatcher
{
    /**
     * @var DispatcherRegistry
     */
    private $registry;

    /**
     * @var
     */
    private $userProvider;

    /**
     * @return mixed
     */
    abstract public function getDispatcherIdentifier();

    /**
     * AbstractDispatcher constructor.
     *
     * @param DispatcherRegistry $registry
     * @param                    $userProvider
     */
    public function __construct(DispatcherRegistry $registry, $userProvider = null)
    {
        $this->registry = $registry;
        $this->userProvider = $userProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled($recipientId)
    {
        // Get dispatcher identifier
        $identifier = $this->getDispatcherIdentifier();

        // todo: Check if this dispatcher is enabled for the given recipient

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getRegistry()->register($this);
    }

    /**
     * @return DispatcherRegistry
     */
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * @return mixed
     */
    public function getUserProvider()
    {
        return $this->userProvider;
    }
}
