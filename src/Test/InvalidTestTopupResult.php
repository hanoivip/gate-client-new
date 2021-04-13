<?php

namespace Hanoivip\GateClientNew\Test;

use Hanoivip\GateClientNew\ITopupResult;

class InvalidTestTopupResult implements ITopupResult
{
    public function isDelay()
    {}

    public function getValue()
    {}

    public function getExplainMessage()
    {}

    public function isSuccess()
    {}

    
}