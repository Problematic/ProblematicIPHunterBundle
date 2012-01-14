<?php

namespace Problematic\IPHunterBundle\Model;

interface HunterLogManagerInterface
{

    /**
     * @return HunterLogInterface
     */
    function createLog();

    function getClass();

    function addLog(HunterLogInterface $log);

}
