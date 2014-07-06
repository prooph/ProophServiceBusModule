<?php
/*
 * This file is part of the prooph/ProophServiceBusModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 11.03.14 - 22:27
 */

namespace ProophServiceBusModuleTest\Mock;

/**
 * Class SomethingDoneHandler
 *
 * @package Prooph\ServiceBusTest\Mock
 * @author Alexander Miertsch <contact@prooph.de>
 */
class SomethingDoneHandler
{
    /**
     * @var SomethingDone
     */
    private $lastEvent;

    /**
     * @param SomethingDone $event
     */
    public function somethingDone(SomethingDone $event)
    {
        $this->lastEvent = $event;
    }

    /**
     * @return SomethingDone
     */
    public function lastEvent()
    {
        return $this->lastEvent;
    }
}
 