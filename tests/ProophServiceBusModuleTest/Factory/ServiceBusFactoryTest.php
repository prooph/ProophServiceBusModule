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

class ServiceBusFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_fabricates_a_service_bus_manager_by_using_default_config()
    {
        $sbm = Bootstrap::getServiceManager()->get("prooph.service_bus");

        $this->assertInstanceOf("Prooph\ServiceBus\Service\ServiceBusManager", $sbm);

        $doSomething = DoSomething::fromData("test command");

        $sbm->route($doSomething);

        $this->assertTrue($doSomething->isHandled());
    }
}
 