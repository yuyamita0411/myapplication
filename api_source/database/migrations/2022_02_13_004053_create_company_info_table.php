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
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('社名');
            $table->string('address')->nullable()->comment('住所');
            $table->string('telnum')->nullable()->comment('電話番号');
            $table->string('mail')->nullable()->comment('メールアドレス');
            $table->string('industry')->nullable()->comment('業界');
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
        Schema::dropIfExists('company_infos');
    }
};
