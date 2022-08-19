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
        Schema::create('descargapeliculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urld',200);
            $table->unsignedBigInteger('lenguajepelicula_id');
            $table->unsignedBigInteger('descarga_id');
            $table->timestamps();

            $table->foreign('lenguajepelicula_id')->references('id')->on('lenguajepeliculas');
            $table->foreign('descarga_id')->references('id')->on('descargas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descargapeliculas');
    }
};
