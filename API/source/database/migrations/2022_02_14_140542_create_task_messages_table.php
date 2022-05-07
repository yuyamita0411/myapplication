<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_messages', function (Blueprint $table) {
            $table->id();
            $table->Integer('taskid')->comment('タスクID');
            $table->string('commenttitle')->comment('コメントタイトル');
            $table->string('commentpassage')->comment('コメントメッセージ');
            $table->datetime('created_at')->nullable()->comment('作成日');
            $table->datetime('updated_at')->nullable()->comment('更新日');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_messages');
    }
};
