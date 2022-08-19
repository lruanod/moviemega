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
        Schema::create('programas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombrep',100);
            $table->text('descripcionp',5000);
            $table->string('portadap',200);
            $table->string('estado',45);
            $table->unsignedBigInteger('pcategoria_id');
            $table->timestamps();

            $table->foreign('pcategoria_id')->references('id')->on('pcategorias');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas');
    }
};
