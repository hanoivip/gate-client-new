<?php

namespace Hanoivip\GateClientNew;

interface ITopupResult
{
    public function isSuccess();
    
    public function isDelay();
    
    public function getValue();
    
    public function getExplainMessage();
}