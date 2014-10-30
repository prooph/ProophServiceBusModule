<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 30.10.14 - 16:17
 */

namespace ProophServiceBusModule;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class AbstractRouterFactory
 *
 * @package ProophServiceBusModule
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
abstract class AbstractRouterFactory implements FactoryInterface
{
    /**
     * @return string
     */
    abstract protected function getRouterClass();

    /**
     * Return config key used within the prooph.psb config namespace to define utils list for the bus.
     *
     * @return string
     */
    abstract protected function getRoutingMapConfigKey();

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @throws \LogicException
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        if (!is_array($config)) {
            throw new \LogicException("Missing application config");
        }

        if (!isset($config['prooph.psb'])) {
            throw new \LogicException("Missing prooph.psb config");
        }

        if (!isset($config['prooph.psb'][$this->getRoutingMapConfigKey()])) {
            throw new \LogicException(sprintf(
                "Missing %s config key in prooph.psb config",
                $this->getRoutingMapConfigKey()
            ));
        }

        $routingMap = $config['prooph.psb'][$this->getRoutingMapConfigKey()];

        if (!is_array($routingMap)) {
            throw new \LogicException(sprintf(
                "prooph.psb.%s config needs to be an array",
                $this->getRoutingMapConfigKey()
            ));
        }

        $routerClass = $this->getRouterClass();

        return new $routerClass($routingMap);
    }
}
 