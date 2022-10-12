<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albuns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->float('valor');
            $table->string('capa');
            $table->timestamp('data_lancamento')->nullable();
            $table->unsignedInteger('artista_id');
            $table->foreign('artista_id')->references('id')->on('artistas');
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
        Schema::dropIfExists('albums');
    }
}
