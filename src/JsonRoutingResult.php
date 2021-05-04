<?php

namespace Hanoivip\GateClientNew;

class JsonRoutingResult implements IRoutingResult
{
    private $route;
    
    public function __construct($route)
    {
        $this->route = $route;
    }
    
    public function isBusy()
    {
        return boolval($this->route['busy']);
    }

    public function gateSession()
    {
        return $this->route['session'];
    }

    public function isAvaiable()
    {
        return boolval($this->route['available']);
    }
    
    public function toArray()
    {
        return $this->route;
    }


}