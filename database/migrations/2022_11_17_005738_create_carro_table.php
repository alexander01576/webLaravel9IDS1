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
        Schema::create('carro', function (Blueprint $table) {
            $table->id();
            $table->string('placas_carro');
            $table->string('marca_carro');
            $table->string('modelo_carro');
            $table->string('color_carro');
            $table->string('no_puertas_carro');
            //$table->foreign('id_tipo_carro')->references('id_tipo')->on('tipo');
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
        Schema::dropIfExists('carro');
    }
};
