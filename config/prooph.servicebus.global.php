<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 03.07.14 - 22:42
 */
/**
 * ProophServiceBus Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish. *
 */
$settings = array(
    /**
     * The Prooph\ServiceBus\Service\ServiceBusManager is a ZF2 ServiceManager.
     * You can use the following config to set up the various services especially command and event handlers.
     */
    'service_bus_manager' => array(
        //'factories' => array(),
        //'invokables' => array(),
    ),
    /**
     * Configure command routing
     */
    'command_map' => array(

    ),
    /**
     * Configure event routing
     */
    'event_map' => array(

    ),
    /**
     * You can add custom ServiceBusInitializers by adding their ServiceLocator aliases to the list
     */
    //'initializers' => array(),
);

/* DO NOT EDIT BELOW THIS LINE */
return array(
    'prooph.service_bus' => $settings
);
