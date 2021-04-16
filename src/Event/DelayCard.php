<?php

namespace Hanoivip\GateClientNew\Event;

class DelayCard
{
    public $mapping;
    
    public $value;
    // card: delay => fail
    public $turnFailed;
    
    public function __construct($mapping, $value, $failed)
    {
        $this->mapping = $mapping;
        $this->value = $value;
        $this->turnFailed = $failed;
    }
}