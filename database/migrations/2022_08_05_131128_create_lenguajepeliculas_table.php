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
        Schema::create('lenguajepeliculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pelicula_id');
            $table->unsignedBigInteger('lenguaje_id');
            $table->timestamps();

            $table->foreign('pelicula_id')->references('id')->on('peliculas');
            $table->foreign('lenguaje_id')->references('id')->on('lenguajes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lenguajepeliculas');
    }
};
