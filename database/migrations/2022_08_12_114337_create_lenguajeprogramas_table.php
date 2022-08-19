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
        Schema::create('lenguajeprogramas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('programa_id');
            $table->unsignedBigInteger('lenguaje_id');
            $table->timestamps();

            $table->foreign('programa_id')->references('id')->on('programas');
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
        Schema::dropIfExists('lenguajeprogramas');
    }
};
