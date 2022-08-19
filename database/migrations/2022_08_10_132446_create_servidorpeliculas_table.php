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
        Schema::create('servidorpeliculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urls',200);
            $table->unsignedBigInteger('lenguajepelicula_id');
            $table->unsignedBigInteger('servidor_id');
            $table->timestamps();

            $table->foreign('lenguajepelicula_id')->references('id')->on('lenguajepeliculas');
            $table->foreign('servidor_id')->references('id')->on('servidors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servidorpeliculas');
    }
};
