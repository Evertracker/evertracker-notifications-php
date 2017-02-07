<?php

/*
 * This file is part of the Commander package.
 *
 * (c) Evertracker GmbH <developers@evertracker.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Evalert\Dispatchers;

/**
 * Class DispatcherBootstrap
 * Responsible for bootstrapping the dispatchers and registering to the registry.
 *
 * @package Evalert\Dispatchers
 */
class DispatcherBootstrap
{
    /**
     * @var DispatcherLocator
     */
    private $locator;

    /**
     * CommandBootstrap constructor.
     *
     * @param DispatcherLocator $locator
     */
    public function __construct(DispatcherLocator $locator)
    {
        $this->locator = $locator;
    }

    /**
     * Locate all dispatchers and register them to the registry
     */
    public function bootstrap()
    {
        $dispatchers = $this->locator->locate();
        foreach ($dispatchers as $dispatcher) {
            $dispatcher->register();
        }
    }
}
