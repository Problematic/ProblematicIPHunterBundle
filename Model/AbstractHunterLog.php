<?php

namespace Problematic\IPHunterBundle\Model;

abstract class AbstractHunterLog implements HunterLogInterface
{

    protected $id;
    protected $createdAt;
    protected $username;
    protected $ip;
    protected $uri;
    protected $method;
    protected $token;

    public function getId()
    {
        return $this->id;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setUsername($username = null)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
    }
    
    public function getUri()
    {
        return $this->uri;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setToken($token = null)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

}
