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