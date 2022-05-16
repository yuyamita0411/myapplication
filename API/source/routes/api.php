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

    Route::get('/user/info', [App\Http\Controllers\API\Auth\LoginController::class, 'GetUserInfo']);// ログアウト
    Route::get('/dashboard', [App\Http\Controllers\API\HomeController::class, 'index']);
    Route::get('/notification/get', [App\Http\Controllers\API\HomeController::class, 'GetNotification']);

    Route::get('/schedule', [App\Http\Controllers\API\General\ScheduleController::class, 'index'])->name('schedule');//ok
    Route::get('/schedule/me/get', [App\Http\Controllers\API\General\ScheduleController::class, 'GetMySchedule'])->name('schedule.me.get');//ok
    Route::get('/schedule/search/usernow', [App\Http\API\Controllers\General\ScheduleController::class, 'SearchScheduleUserNow'])->name('schedule.search.usernow');//ok
    Route::get('/schedule/add', [App\Http\Controllers\API\General\ScheduleController::class, 'AddSchedule'])->name('schedule.schedule.add');//ok
    Route::get('/schedule/search', [App\Http\Controllers\API\General\ScheduleController::class, 'search'])->name('schedule.schedule.search');//ok
    Route::post('/schedule/rebase', [App\Http\Controllers\API\General\ScheduleController::class, 'RebaseSchedule'])->name('schedule.schedule.rebase');//ok
    Route::get('/schedule/get/id', [App\Http\Controllers\API\General\ScheduleController::class, 'GetScheduleFromId'])->name('schedule.schedule.fromid');//ok
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/