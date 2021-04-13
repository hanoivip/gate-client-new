<?php

namespace Hanoivip\GateClientNew;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Hanoivip\GateClientNew\Service\RemoteGateService;
use Hanoivip\GateClientNew\Service\LocalGateService;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/gate.php', 'gate');
        
        $mode = config('gate.mode', 'local');
        if ($mode == 'remote')
        {
            //Log::debug("Bind as RemoteGateService");
            $this->app->bind("GateService", function ($app) {
                return new RemoteGateService();
            });
        }
        if ($mode == 'local')
        {
            //Log::debug("Bind as LocalGateService");
            $this->app->bind("GateService", function ($app) {
                return new LocalGateService();
            });
        }
        $this->commands([
            \Hanoivip\GateClientNew\Command\TestDelay::class,
        ]);
    }
    
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/gate.php' => config_path('gate.php'),
        ]);
        $this->loadRoutesFrom(__DIR__ . '/../route/api.php');
    }
}