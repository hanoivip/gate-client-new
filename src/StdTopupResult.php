<?php

namespace Hanoivip\GateClientNew;

class StdTopupResult implements ITopupResult
{
    private $cardCheck;
    
    public function __construct($check)
    {
        $this->cardCheck = $check;
    }
    
    public function isDelay()
    {
        return $this->cardCheck->processCode == ProcessCode::DELAY_CARD;
    }

    public function getValue()
    {
        return $this->cardCheck->value;
    }

    public function getExplainMessage()
    {
        return $this->cardCheck->message;
    }

    public function isSuccess()
    {
        return $this->isDelay() || $this->cardCheck->processCode == ProcessCode::VALID_CARD;
    }

    
}