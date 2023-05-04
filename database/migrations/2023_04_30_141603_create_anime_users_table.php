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
        Schema::disableForeignKeyConstraints();
        Schema::create('anime_users', function (Blueprint $table) {
            $table->foreignId('anime_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->String('edit_title', 50);
            $table->String('edit_on_air_season', 15);
            $table->String('edit_img_pass',200);
            $table->String('day_of_week', 5);
            $table->integer('hours');
            $table->integer('minutes');
            $table->String('medium', 20);
            $table->String('official_url');
            $table->timestamps();
            $table->softDeletes();
            $table->primary(['anime_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_users');
    }
};
