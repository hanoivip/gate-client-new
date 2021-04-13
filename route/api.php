<?php

use Illuminate\Support\Facades\Route;

// Public APIs
Route::prefix('api')->namespace('Hanoivip\GateClientNew\Controller')->group(function () {
    // Trả thẻ trễ
    Route::get('/gate/delay', 'Delay@callback');
});

