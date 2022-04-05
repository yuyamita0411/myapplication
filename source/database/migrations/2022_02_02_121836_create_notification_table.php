<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('タイトル');
            $table->string('passage')->comment('メッセージ');
            $table->Integer('fromuserid')->comment('メッセージ送信元id');
            $table->string('fromuser')->comment('メッセージ送信元');
            $table->Integer('touserid')->comment('メッセージ送信先id');
            $table->string('touser')->comment('メッセージ送信先');
            $table->Integer('companyid')->nullable()->comment('会社ID');
            $table->string('notificationlink')->nullable()->comment('お知らせ先リンク');
            $table->datetime('created_at')->nullable()->comment('作成日');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
