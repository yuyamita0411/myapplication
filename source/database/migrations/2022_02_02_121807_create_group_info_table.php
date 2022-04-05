<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('groupname')->nullable()->comment('グループ名');
            $table->Integer('cid')->nullable()->comment('管理者ID');
            $table->string('cname')->nullable()->comment('管理者名');
            $table->string('groupdescription')->nullable()->comment('グループ概要');
            $table->Integer('companyid')->comment('会社ID');
            $table->string('groupcredentials')->nullable()->comment('グループ識別子');
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
        Schema::dropIfExists('group_infos');
    }
}
