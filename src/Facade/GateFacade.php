<?php

namespace Hanoivip\GateClientNew\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed guard(string|null $name = null)
 * @method static void shouldUse(string $name);
 * @method static bool check()
 * @method static bool guest()
 *
 * @see \Illuminate\Auth\AuthManager
 */
class GateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'GateService';
    }
}
