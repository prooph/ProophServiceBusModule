<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 02.06.14 - 22:02
 */

namespace ProophServiceBusModule;

/**
 * Class Module
 *
 * @package src\ProophEventStoreModule
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class Module 
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }


    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'prooph.psb.callback_invoke_strategy'       => 'Prooph\ServiceBus\InvokeStrategy\CallbackStrategy',
                'prooph.psb.handle_command_invoke_strategy' => 'Prooph\ServiceBus\InvokeStrategy\HandleCommandStrategy',
                'prooph.psb.on_event_invoke_strategy'       => 'Prooph\ServiceBus\InvokeStrategy\OnEventStrategy',
            ),
            'factories' => array(
                'prooph.psb.command_bus'            => 'ProophServiceBusModule\CommandBusFactory',
                'prooph.psb.event_bus'              => 'ProophServiceBusModule\EventBusFactory',
                'prooph.psb.command_router'         => 'ProophServiceBusModule\CommandRouterFactory',
                'prooph.psb.event_router'           => 'ProophServiceBusModule\EventRouterFactory',
                'prooph.psb.service_locator_proxy'  => 'ProophServiceBusModule\ServiceLocatorProxyFactory',
            )
        );
    }
}
 