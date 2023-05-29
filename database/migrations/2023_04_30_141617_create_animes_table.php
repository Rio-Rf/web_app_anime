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
        //Schema::disableForeignKeyConstraints();
        if (!Schema::hasTable('animes')) {
            Schema::create('animes', function (Blueprint $table) {
                $table->id();
                $table->String('title', 50)->unique();
                $table->String('on_air_season', 20);
                $table->String('img_path', 200);
                $table->String('official_url', 200);
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('animes');
    }
};
