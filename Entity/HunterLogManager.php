<?php

namespace Problematic\IPHunterBundle\Entity;

use Problematic\IPHunterBundle\Model\AbstractHunterLogManager;
use Doctrine\ORM\EntityManager;
use Problematic\IPHunterBundle\Model\HunterLogInterface;

class HunterLogManager extends AbstractHunterLogManager
{

    protected $em;
    protected $repo;
    protected $class;

    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->repo = $em->getRepository($class);
        $this->class = $class;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function addLog(HunterLogInterface $log)
    {
        $this->em->persist($log);
        $this->em->flush();
    }

}
