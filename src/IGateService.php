<?php

namespace Hanoivip\GateClientNew;

use stdClass;

interface IGateService
{
    public function status();
    /**
     * 
     * @param string $type
     * @param string $value
     * @return IRoutingResult
     */
    public function routing($type, $value);
    /**
     * Topup with prepaid methods
     * @param string $session
     * @param stdClass $card
     * @param string $mapping
     * @return ITopupResult
     */
    public function prepaid($session, $card, $mapping = null);
    // Purchase 
    public function pay($session, $card, $mapping = null);
    
    public function refresh($session);
    
    public function cancel($session);
}