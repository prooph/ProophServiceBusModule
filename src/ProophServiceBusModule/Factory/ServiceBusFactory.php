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

        $sbmConfig = null;
        $initializers = array();

        if (isset($config['prooph.service_bus'])) {
            if (isset($config['prooph.service_bus']['service_bus_manager'])) {
                $sbmConfig = new Config($config['prooph.service_bus']['service_bus_manager']);
            }


            if (isset($config['prooph.service_bus']['service_bus_initializers'])) {
                foreach ($config['prooph.service_bus']['service_bus_initializers'] as $initializerAlias)
                    $initializers[] = $serviceLocator->get($initializerAlias);
            }
        }

        $sbm = new ServiceBusManager($sbmConfig);

        $sbm->setMainServiceLocator($serviceLocator);

        foreach ($initializers as $initializer) {
            $sbm->events()->attachAggregate($initializer);
        }

        $sbm->initialize();

        return $sbm;
    }
}
 