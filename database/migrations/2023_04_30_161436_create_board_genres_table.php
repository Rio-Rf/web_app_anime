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
        if (!Schema::hasTable('board_genres')) {
            Schema::create('board_genres', function (Blueprint $table) {
                $table->foreignId('board_id')->constrained();
                $table->foreignId('genre_id')->constrained();
                $table->timestamps();
                $table->softDeletes();
                $table->primary(['board_id', 'genre_id']);
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
        Schema::dropIfExists('board_genres');
    }
};
