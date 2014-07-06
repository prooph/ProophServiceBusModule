<?php
/*
 * This file is part of the prooph/prooph-service-bus-module.
 * (c) Alexander Miertsch <kontakt@codeliner.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 04.06.14 - 21:49
 */

namespace ProophServiceBusModule\Factory;

use Prooph\ServiceBus\Service\ServiceBusConfiguration;
use Prooph\ServiceBus\Service\ServiceBusManager;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ServiceBusFactory
 *
 * @package ModServiceBus\Service
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class ServiceBusFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return ServiceBusManager
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('configuration');

        $initializers = array();

        $sbmConfig = array();

        if (isset($config['prooph.service_bus'])) {

            if (isset($config['prooph.service_bus']['initializers'])) {
                foreach ($config['prooph.service_bus']['initializers'] as $initializerAlias)
                    $initializers[] = $serviceLocator->get($initializerAlias);

                unset($config['prooph.service_bus']['initializers']);
            }

            $sbmConfig = $config['prooph.service_bus'];
        }

        $sbm = new ServiceBusManager(new ServiceBusConfiguration($sbmConfig));

        $sbm->setMainServiceLocator($serviceLocator);

        foreach ($initializers as $initializer) {
            $sbm->events()->attachAggregate($initializer);
        }

        $sbm->initialize();

        return $sbm;
    }
}
 