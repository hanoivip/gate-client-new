<?php

namespace Hanoivip\GateClientNew\Command;

use Illuminate\Console\Command;
use Hanoivip\GateClientNew\Event\DelayCard;

class TestDelay extends Command
{
    protected $signature = 'test:delay {mapping} {value}';
    
    protected $description = 'Test of delay card notification';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        $mapping = $this->argument('mapping');
        $value = $this->argument('value');
        event(new DelayCard($mapping, $value));
    }
}
