<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});
//404の時
/*Route::fallback(function(){
    return redirect(route('dashboard'));
});*/

Auth::routes();
//認証後に見れるページ
//認証後にユーザーのタイプによってアクセスに制限をかけるミドルウェアを挟む
Route::middleware(['auth:web', 'check.which.user', 'send.data.to.template'])->prefix('/v1')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::post('dashboard/notification', [App\Http\Controllers\HomeController::class, 'GetNotification'])->name('dashboard.notification');
    Route::get('taskinfo', [App\Http\Controllers\Common\TaskInfoController::class, 'index'])->name('taskinfo');//ok
    Route::post('taskinfo', [App\Http\Controllers\Common\TaskInfoController::class, 'SendTaskMsg'])->name('taskinfo.send');//ok
    Route::post('taskinfo/assign', [App\Http\Controllers\Common\TaskInfoController::class, 'AssignTask'])->name('taskinfo.assign');//ok
    Route::post('taskinfo/search', [App\Http\Controllers\Common\TaskInfoController::class, 'TaskInfoSearch'])->name('taskinfo.search');//ok

    /*一般ユーザーのみ閲覧可能*/
    Route::get('groupinfo', [App\Http\Controllers\General\GroupInfoController::class, 'index'])->name('groupinfo');//ok
    Route::post('groupinfo/delete', [App\Http\Controllers\General\GroupInfoController::class, 'delete'])->name('groupinfo.delete');//ok
    Route::post('groupinfo/search', [App\Http\Controllers\General\GroupInfoController::class, 'search'])->name('groupinfo.search');//ok
    Route::post('groupinfo/search/usernow', [App\Http\Controllers\General\GroupInfoController::class, 'SearchUserNow'])->name('groupinfo.search.usernow');//ok
    Route::post('groupinfo/search/keyword', [App\Http\Controllers\General\GroupInfoController::class, 'SearchByKyeword'])->name('groupinfo.search.keyword');//ok
    Route::post('groupinfo/add/user', [App\Http\Controllers\General\GroupInfoController::class, 'AddUser'])->name('groupinfo.add.user');//ok
    Route::post('groupinfo/create', [App\Http\Controllers\General\GroupInfoController::class, 'CreateGroup'])->name('groupinfo.create');//ok

    /*管理者のみ閲覧可能*/
    Route::get('manageuser', [App\Http\Controllers\Admin\ManageUserController::class, 'index'])->name('manageuser');//ok
    Route::post('manageuser', [App\Http\Controllers\Admin\ManageUserController::class, 'index'])->name('manageuser');//ok
    Route::post('manageuser/import', [App\Http\Controllers\Admin\ManageUserController::class, 'InportCompanyUser'])->name('manageuser.post');//ok
});

Route::middleware(['auth:web', 'send.data.to.template'])->prefix('/v1')->group(function () {
    Route::get('schedule', [App\Http\Controllers\General\ScheduleController::class, 'index'])->name('schedule');//ok
    Route::post('schedule', [App\Http\Controllers\General\ScheduleController::class, 'index'])->name('schedule.post');//ok
    Route::post('schedule/me', [App\Http\Controllers\General\ScheduleController::class, 'GetMySchedule'])->name('schedule.me.post');//ok
    Route::post('schedule/search/usernow', [App\Http\Controllers\General\ScheduleController::class, 'SearchScheduleUserNow'])->name('schedule.search.usernow');//ok
    Route::post('schedule/add', [App\Http\Controllers\General\ScheduleController::class, 'AddSchedule'])->name('schedule.schedule.add');//ok
    Route::post('schedule/search', [App\Http\Controllers\General\ScheduleController::class, 'search'])->name('schedule.schedule.search');//ok
    Route::post('schedule/rebase', [App\Http\Controllers\General\ScheduleController::class, 'RebaseSchedule'])->name('schedule.schedule.rebase');//ok
    Route::post('schedule/get/id', [App\Http\Controllers\General\ScheduleController::class, 'GetScheduleFromId'])->name('schedule.schedule.fromid');//ok
    //    Route::post('schedule/getalluser', [App\Http\Controllers\General\ScheduleController::class, 'ReturnComapnyUser'])->name('schedule.post.getalluser');//ok
    Route::get('taskdetail/{id}', [App\Http\Controllers\Common\TaskInfoController::class, 'TaskDetail'])->name('taskdetail');//ok
    Route::post('taskdetail/addcomments/{id}', [App\Http\Controllers\Common\TaskInfoController::class, 'TaskDetailAddComments'])->name('taskdetail.addcomments');//ok
    Route::post('taskdetail/addcomments/{id}/search', [App\Http\Controllers\Common\TaskInfoController::class, 'TaskDetailSearchComment'])->name('taskdetail.searchcomments');//ok
});