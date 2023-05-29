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
        if (!Schema::hasTable('anime_genres')) {
            Schema::create('anime_genres', function (Blueprint $table) {
                $table->foreignId('anime_id')->constrained();
                $table->foreignId('genre_id')->constrained();
                $table->timestamps();
                $table->softDeletes();
                $table->primary(['anime_id', 'genre_id']);
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
        Schema::dropIfExists('anime_genres');
    }
};
