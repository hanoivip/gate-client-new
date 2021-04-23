<?php

namespace Hanoivip\GateClientNew\Service;

use Hanoivip\GateClientNew\IGateService;
use Illuminate\Support\Facades\Log;
use Mervick\CurlHelper;
use Exception;
use Hanoivip\GateClientNew\JsonTopupResult;
use Hanoivip\GateClientNew\JsonRoutingResult;

class RemoteGateService implements IGateService
{
    public function cancel($session)
    {
        $url = config('gate.remote.uri') . "/api/" . config('gate.remote.version') . "/topup/cancel?session=" . $session;
        CurlHelper::factory($url)->exec();
        return true;
    }

    public function routing($type, $dvalue)
    {
        $data = ['client' => config('gate.client_id'), 'type' => $type, 'dvalue' => $dvalue];
        $url = config('gate.remote.uri') . "/api/" . config('gate.remote.version') . "/topup/prepare";
        Log::debug('GateProxy dump prepare url:' . $url);
        $response = CurlHelper::factory($url)->setPostFields($data)->exec();
        Log::debug('GateProxy dump prepare response:' . print_r($response['data'], true));
        return new JsonRoutingResult($response['data']);
    }

    public function refresh($session)
    {
        $url = config('gate.remote.uri') . "/api/" . config('gate.remote.version') . "/topup/refresh?session=" . $session;
        $response = CurlHelper::factory($url)->exec();
        return $response['data'];
    }

    public function prepaid($session, $card, $mapping = null)
    {
        $data = ['client' => config('gate.client_id'),
            'session' => $session,
            'serial' => $card->serial, 
            'password' => $card->password,
            'mapping' => $mapping, 
            'captcha' => $card->captcha,
        ];
        $url = config('gate.remote.uri') . "/api/" . config('gate.remote.version') . "/topup";
        $response = CurlHelper::factory($url)->setPostFields($data)->exec();
        Log::debug("GateProxy dump prepaid:" . $response['content']);
        return new JsonTopupResult($response['data']);
    }

    public function pay($session, $card, $mapping = null)
    {
        throw new Exception("Post paid method not available");
    }

    public function status()
    {
        $url = config('gate.remote.uri') . "/api/status";
        Log::debug('GateProxy dump status url:' . $url);
        $response = CurlHelper::factory($url)->exec();
        Log::debug('GateProxy dump status:' . $response['content']);
        return $response['data'];
    }
    
}