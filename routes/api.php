<?php
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/rules', [ApiController::class, 'rules']);
    Route::post('/rules', [ApiController::class, 'storeRule']);
    Route::get('/rules/{rule}', [ApiController::class, 'showRule']);
    Route::put('/rules/{rule}', [ApiController::class, 'updateRule']);
    Route::delete('/rules/{rule}', [ApiController::class, 'deleteRule']);
    Route::get('/logs', [ApiController::class, 'logs']);
    Route::get('/stats', [ApiController::class, 'stats']);
    Route::get('/iptables', [ApiController::class, 'iptables']);
});
