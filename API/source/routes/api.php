<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\AppliUser;
use Illuminate\Support\Facades\Hash;


Route::get('/check/auth/failed', function(){
    return 'メールアドレス、またはパスワードが違います。';
});
Route::post('/register', [App\Http\Controllers\API\Auth\RegisterController::class, 'register']);// ユーザー登録
Route::post('/login', [App\Http\Controllers\API\Auth\LoginController::class, 'login']);// ログイン
Route::post('/logout', [App\Http\Controllers\API\Auth\LoginController::class, 'logout']);// ログアウト

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user/check', [App\Http\Controllers\API\Auth\AccessTokenController::class, 'UserCheck']);// ログアウト
    Route::get('/dashboard', [App\Http\Controllers\API\HomeController::class, 'index']);
    Route::get('/notification/get', [App\Http\Controllers\API\HomeController::class, 'GetNotification']);
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/