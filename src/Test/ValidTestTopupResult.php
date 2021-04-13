<?php

namespace Hanoivip\GateClientNew\Test;

use Hanoivip\GateClientNew\ITopupResult;

class ValidTestTopupResult implements ITopupResult
{
    public function isDelay()
    {
        return false;
    }

    public function getValue()
    {
        return 20000;
    }

    public function getExplainMessage()
    {
        return 'Thanh Cong';
    }

    public function isSuccess()
    {
        return true;
    }
    
}