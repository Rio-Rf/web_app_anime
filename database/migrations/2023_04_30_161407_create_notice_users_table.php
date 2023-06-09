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
        if (!Schema::hasTable('notice_users')) {
            Schema::create('notice_users', function (Blueprint $table) {
                $table->foreignId('notice_id')->constrained();
                $table->foreignId('user_id')->constrained();
                $table->timestamps();
                $table->softDeletes();
                $table->primary(['notice_id', 'user_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notice_users');
    }
};
