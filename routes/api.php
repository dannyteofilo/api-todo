<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TaskController as TasksV1;

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
    ->only(['index', 'update', 'store', 'destroy', 'show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
