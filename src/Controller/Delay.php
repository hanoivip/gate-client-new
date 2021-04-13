<?php

namespace Hanoivip\GateClientNew\Controller;

use Illuminate\Http\Request;
use Hanoivip\GateClientNew\Event\DelayCard;

class Delay extends Controller
{
    public function callback(Request $request)
    {
        $mapping = $request->input('mapping');
        $value = $request->input('value');
        event(new DelayCard($mapping, $value));
        return response("true");
    }
}
