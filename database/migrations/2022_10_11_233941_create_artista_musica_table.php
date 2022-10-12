<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_musica', function (Blueprint $table) {
            $table->unsignedInteger('artista_id');
            $table->foreign('artista_id')->references('id')->on('artistas');
            $table->unsignedInteger('musica_id');
            $table->foreign('musica_id')->references('id')->on('musicas');
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
        Schema::dropIfExists('artista_musica');
    }
}
