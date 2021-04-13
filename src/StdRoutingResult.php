<?php

namespace Hanoivip\GateClientNew;

use Illuminate\Support\Facades\Log;

class StdRoutingResult implements IRoutingResult
{
    private $route;
    
    public function __construct($route)
    {
        //Log::debug(print_r($route, true));
        $this->route = $route;
    }
    
    public function isBusy()
    {
        return boolval($this->route->busy);
    }

    public function gateSession()
    {
        return $this->route->gateSession;
    }

    public function isAvaiable()
    {
        return boolval($this->route->available);
    }
    
    public function toArray()
    {
        return $this->route->toArray();
    }


}