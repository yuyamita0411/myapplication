<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('task_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('taskname')->comment('タスク名');
            $table->string('taskdescription')->nullable()->comment('タスク説明');
            $table->Integer('userid')->comment('担当ユーザーID');
            $table->string('username')->comment('ユーザー名');
            $table->Integer('fromuserid')->comment('依頼ユーザーID');
            $table->string('fromusername')->comment('依頼者名');
            $table->string('groupname')->comment('グループ名');
            $table->datetime('deadline')->comment('締切');
            $table->string('status')->comment('ステータス');
            $table->datetime('startdate')->comment('依頼日');
            $table->Integer('companyid')->nullable()->comment('会社ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_infos');
    }

}