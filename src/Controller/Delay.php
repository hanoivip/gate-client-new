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
        $failed = false;
        if ($request->has('failed'))
            $failed = boolval($request->input('failed'));
        event(new DelayCard($mapping, $value, $failed));
        return response("true");
    }
}
