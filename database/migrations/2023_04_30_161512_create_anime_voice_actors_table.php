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
        Schema::create('anime_voice_actors', function (Blueprint $table) {
            $table->foreignId('anime_id')->constrained();
            $table->foreignId('voice_actor_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
            $table->primary(['anime_id', 'voice_actor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_voice_actors');
    }
};
