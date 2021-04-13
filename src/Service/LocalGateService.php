<?php

namespace Hanoivip\GateClientNew\Service;

use Hanoivip\GateClientNew\IGateService;
use Exception;
use Hanoivip\GateClientNew\StdTopupResult;
use Hanoivip\GateClientNew\StdRoutingResult;

class LocalGateService implements IGateService
{
    private $innerService;
    
    public function __construct()
    {
        $this->innerService = app()->make('innerGateService');
    }
    
    public function cancel($session)
    {
        return $this->innerService->cancel($session);
    }
    
    public function routing($type, $value)
    {
        $clientId = config('gate.client_id');
        $route = $this->innerService->preroute($clientId, $type, $value);
        return new StdRoutingResult($route);
    }
    
    public function refresh($session)
    {
        return $this->innerService->refreshCaptcha($session);
    }
    
    public function prepaid($session, $card, $mapping = null)
    {
        $check = $this->innerService->topupWithRoute($session, $card->serial, $card->password, $mapping, $card->captcha);
        return new StdTopupResult($check);
    }
    
    public function pay($session, $card, $mapping = null)
    {
        throw new Exception("Local gate service post paid not support now");
    }
    
    public function status()
    {
        return $this->innerService->status();
    }
    
    
}