<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\JsonRpcServer;
use App\Http\Controllers\ActivityController;


//Route::post('/activity/save', ['as' => 'index','uses' => 'ActivityController@saveNew']);
//Route::get('/activity/list', ['as' => 'index','uses' => 'ActivityController@getList']);

Route::middleware('auth:api')->post('/activity/data', function (Request $request, JsonRpcServer $server, ActivityController $controller) {
    return $server->handle($request,$controller);
});
