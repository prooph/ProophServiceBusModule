<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 30.10.14 - 16:30
 */

namespace ProophServiceBusModule;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Prooph\ServiceBus\ServiceLocator\Zf2ServiceLocatorProxy;

/**
 * Class ServiceManagerProxyFactory
 *
 * @package ProophServiceBusModule
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class ServiceLocatorProxyFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Zf2ServiceLocatorProxy($serviceLocator);
    }
}
 