<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 09.03.14 - 20:51
 */

namespace ProophServiceBusModuleTest\Mock;

/**
 * Class DoSomethingHandler
 *
 * @package Prooph\ServiceBusTest\Mock
 * @author Alexander Miertsch <contact@prooph.de>
 */
class DoSomethingHandler
{
    /**
     * @var DoSomething
     */
    private $lastCommand;

    /**
     * @param DoSomething $aCommand
     */
    public function handleDoSomething(DoSomething $aCommand)
    {
        $this->lastCommand = $aCommand;
        $this->lastCommand->handle();
    }

    /**
     * @return DoSomething
     */
    public function lastCommand()
    {
        return $this->lastCommand;
    }
}
