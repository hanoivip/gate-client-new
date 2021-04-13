<?php

namespace Hanoivip\GateClientNew;

interface IRoutingResult
{
    public function isAvaiable();
    
    public function isBusy();
    
    public function gateSession();
    
    public function toArray();
}