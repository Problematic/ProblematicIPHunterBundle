<?php

namespace Problematic\IPHunterBundle\Model;

abstract class AbstractHunterLogManager implements HunterLogManagerInterface
{

    public function createLog()
    {
        $class = $this->getClass();
        $log = new $class();

        return $log;
    }

}
