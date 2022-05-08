<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\AppliUser;
use Illuminate\Support\Facades\Hash;


Route::post('/register', [App\Http\Controllers\API\RegisterController::class, 'register']);// ユーザー登録
Route::post('/login', [App\Http\Controllers\API\LoginController::class, 'login']);// ログイン
Route::post('/logout', [App\Http\Controllers\API\LoginController::class, 'logout']);// ログアウト

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/hoge', function(){
        return 'auth is working!!';
    });
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('/items', function(Request $request) {
    $data = [
        [
            "id" => 7,
            "name" => "na like this",
            "description" => "",
            "created_at" => "2020-07-26T05:53:00.376501Z",
            "updated_at" => "2020-07-26T05:53:00.376501Z"
        ], [
            "id" => 5,
            "name" => "write a book",
            "description" => "hohoho",
            "created_at" => "2020-07-26T05:47:00.908706Z",
            "updated_at" => "2020-07-26T05:53:00.376501Z"
        ]
    ];
    return response()->json($data);
 });