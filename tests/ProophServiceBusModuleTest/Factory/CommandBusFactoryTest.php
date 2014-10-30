<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 05.07.14 - 17:36
 */

namespace ProophServiceBusModuleTest\Factory;

use ProophServiceBusModuleTest\Bootstrap;
use ProophServiceBusModuleTest\Mock\DoSomething;
use ProophServiceBusModuleTest\TestCase;

/**
 * Class CommandBusFactoryTest
 *
 * @package ProophServiceBusModuleTest\Factory
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class CommandBusFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_fabricates_a_command_bus_by_using_default_config()
    {
        $commandBus = Bootstrap::getServiceManager()->get("prooph.psb.command_bus");

        $this->assertInstanceOf("Prooph\ServiceBus\CommandBus", $commandBus);

        $doSomething = DoSomething::fromData("test command");

        $commandBus->dispatch($doSomething);

        $this->assertTrue($doSomething->isHandled());
    }
}
 