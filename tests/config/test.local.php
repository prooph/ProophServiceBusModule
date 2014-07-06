<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <kontakt@codeliner.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 05.07.14 - 18:54
 */
return array(
    'prooph.service_bus' => array(
        'service_bus_manager' => array(
            'invokables' => array(
                'ProophServiceBusModuleTest\Mock\DoSomethingHandler' => 'ProophServiceBusModuleTest\Mock\DoSomethingHandler'
            ),
        ),
        \Prooph\ServiceBus\Service\Definition::COMMAND_HANDLER_INVOKE_STRATEGIES => array(
            'do_something_invoke_strategy'
        ),
        \Prooph\ServiceBus\Service\Definition::INVOKE_STRATEGY_LOADER => array(
            'invokables' => array(
                'do_something_invoke_strategy' => 'ProophServiceBusModuleTest\Mock\DoSomethingInvokeStrategy',
            )
        ),
        \Prooph\ServiceBus\Service\Definition::COMMAND_MAP => array(
            'ProophServiceBusModuleTest\Mock\DoSomething' => 'ProophServiceBusModuleTest\Mock\DoSomethingHandler'
        )
    )
);