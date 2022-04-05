<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appli_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 200)->default('-')->comment('ユーザー種別');
            $table->string('name', 200)->default('ー')->comment('ユーザー名');
            $table->string('mail_address', 200)->unique()->default('ー')->comment('ユーザーメールアドレス');
            $table->string('password');
            $table->Integer('companyid')->nullable()->comment('会社ID');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appli_users');
    }
}
