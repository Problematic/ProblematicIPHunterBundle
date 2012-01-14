<?php

namespace Problematic\IPHunterBundle\Model;


interface HunterLogInterface
{

    function setCreatedAt(\DateTime $createdAt);
    
    function getCreatedAt();
    
    function setUsername($username = null);
    
    function getUsername();
    
    function setIp($ip);
    
    function getIp();
    
    function setUri($uri);

    function getUri();

    function setMethod($method);

    function getMethod();

    function setToken($token = null);

    function getToken();

}
