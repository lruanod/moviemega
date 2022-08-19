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
        Schema::create('pcomentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuariopc',150);
            $table->text('descripcionpc',5000);
            $table->unsignedBigInteger('programa_id');
            $table->timestamps();

            $table->foreign('programa_id')->references('id')->on('programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcomentarios');
    }
};
