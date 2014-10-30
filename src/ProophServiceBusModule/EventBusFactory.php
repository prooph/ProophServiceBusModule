<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 30.10.14 - 18:10
 */

namespace ProophServiceBusModule;

/**
 * Class EventBusFactory
 *
 * @package ProophServiceBusModule
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class EventBusFactory extends AbstractBusFactory
{

    /**
     * @return string
     */
    protected function getBusClass()
    {
        return 'Prooph\ServiceBus\EventBus';
    }

    /**
     * Return config key used within the prooph.psb config namespace to define utils list for the bus.
     *
     * @return string
     */
    protected function getConfigKey()
    {
        return 'event_bus';
    }
}
 