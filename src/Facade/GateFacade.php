<?php

namespace Hanoivip\GateClientNew\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static IRoutingResult routing(string $type, string $value)
 * @method static void shouldUse(string $name);
 * @method static bool check()
 * @method static bool guest()
 *
 * @see \Hanoivip\GateClientNew\IGateService
 */
class GateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'GateService';
    }
}
