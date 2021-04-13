<?php

namespace Hanoivip\GateClientNew\Event;

class DelayCard
{
    public $mapping;
    
    public $value;
    
    public function __construct($mapping, $value)
    {
        $this->mapping = $mapping;
        $this->value = $value;
    }
}