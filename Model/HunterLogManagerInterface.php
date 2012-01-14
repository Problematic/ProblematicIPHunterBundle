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

    /**
     * @return HunterLogInterface
     */
    function find($id);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    function findLogs();

}
