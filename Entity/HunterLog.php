<?php

namespace Problematic\IPHunterBundle\Entity;

use Problematic\IPHunterBundle\Model\AbstractHunterLog;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class HunterLog extends AbstractHunterLog
{

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $username;

    /**
     * @ORM\Column(type="string")
     */
    protected $ip;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $uri;

    /**
     * @ORM\Column(type="string")
     */
    protected $method;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $token;

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime());
    }

}
