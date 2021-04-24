<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TaskController as TasksV1;
use \App\Http\Controllers\StatusController as StatusV1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/tasks', TasksV1::class)
    ->only(['index', 'update', 'store', 'destroy', 'show'])
    ->middleware('auth:sanctum');

Route::apiResource('/status', StatusV1::class)
    ->only('index')
    ->middleware('auth:sanctum');

Route::post('auth/login',[\App\Http\Controllers\Api\LoginController::class,
    'login'
]);

Route::post('auth/register',[\App\Http\Controllers\Api\LoginController::class,
    'register'
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
