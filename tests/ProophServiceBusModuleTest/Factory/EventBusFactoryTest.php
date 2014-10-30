<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 30.10.14 - 18:07
 */

namespace ProophServiceBusModuleTest\Factory;

use ProophServiceBusModuleTest\Bootstrap;
use ProophServiceBusModuleTest\Mock\SomethingDone;
use ProophServiceBusModuleTest\TestCase;

/**
 * Class EventBusFactoryTest
 *
 * @package ProophServiceBusModuleTest\Factory
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class EventBusFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_fabricates_a_event_bus_and_uses_default_config_for_set_up()
    {
        $eventBus = Bootstrap::getServiceManager()->get("prooph.psb.event_bus");

        $this->assertInstanceOf("Prooph\ServiceBus\EventBus", $eventBus);

        $somethingDone = SomethingDone::fromData("test event");

        $eventBus->dispatch($somethingDone);

        $this->assertTrue($somethingDone->isHandled());
    }
}
 