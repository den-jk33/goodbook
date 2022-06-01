<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\JsonRpcClient;



Route::middleware('activity_log')->get('/', ['as' => 'index','uses' => 'BooksController@getList']);

Route::middleware('activity_log')->get("/m1",function (){
    return view('main',['text'=>"When I was six years old, I saw a picture in a book. It was a picture of a snake who was eating a big animal. Here is a copy of the picture."]);
});
Route::middleware('activity_log')->get("/page",function (){
    return view('main',['text'=>"In the book it said, “Snakes eat the whole animal. Then they are not able to move. And they sleep for six months"]);
});
Route::middleware('activity_log')->get("/t1",function (){
    return view('main',['text'=>"I thought about the life in the jungle. Then I made my first picture. This is my picture number one."]);
});








Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {

    Route::get('/activity',function(Request $request, JsonRpcClient $jsonRpcClient){

        $activities_pagination = $jsonRpcClient->getList($request->all());
        $activities = (!empty($activities_pagination['data']))?$activities_pagination['data']:null;

        return view('admin.main',['activities'=>$activities,"activities_pagination"=>$activities_pagination,"tt"=>"111111"]);
    });


});
