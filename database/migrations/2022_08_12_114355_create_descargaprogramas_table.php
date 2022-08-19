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
        Schema::create('descargaprogramas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urlp',200);
            $table->unsignedBigInteger('lenguajeprograma_id');
            $table->unsignedBigInteger('descarga_id');
            $table->timestamps();

            $table->foreign('lenguajeprograma_id')->references('id')->on('lenguajeprogramas');
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
        Schema::dropIfExists('descargaprogramas');
    }
};
