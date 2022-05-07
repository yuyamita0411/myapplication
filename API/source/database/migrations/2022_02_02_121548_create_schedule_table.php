<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->comment('スケジュールのタイトル');
            $table->string('description')->nullable()->comment('スケジュールの概要');
            $table->dateTime('starttime')->nullable()->comment('開始時刻');
            $table->dateTime('endtime')->nullable()->comment('終了時刻');
            $table->Integer('groupid')->nullable()->comment('グループID');
            $table->Integer('taskid')->nullable()->comment('タスクID');
            $table->Integer('companyid')->comment('会社ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
