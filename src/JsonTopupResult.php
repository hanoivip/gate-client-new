<?php

namespace Hanoivip\GateClientNew;

use Hanoivip\GateClientNew\ProcessCode;
use Illuminate\Support\Facades\Log;

class JsonTopupResult implements ITopupResult
{
    private $cardCheck;
    
    public function __construct($json)
    {
        Log::debug(print_r($json, true));
        $this->cardCheck = $json;
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
        return $this->isDelay() || ($this->cardCheck->processCode == ProcessCode::VALID_CARD);
    }

    
}