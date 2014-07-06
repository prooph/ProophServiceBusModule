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
                'prooph.service_bus.local_initializer' => 'Prooph\ServiceBus\Initializer\LocalSynchronousInitializer',
            ),
            'factories' => array(
                'prooph.service_bus' => 'ProophServiceBusModule\Factory\ServiceBusFactory',
            )
        );
    }
}
 