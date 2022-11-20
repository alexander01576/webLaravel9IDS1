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
        // agregar llave foranea a la tabla cajon de estacionamiento
        Schema::table('cajon', function (Blueprint $table) {
            // $table->foreignId('id_estacionamiento_cajon')->references('id_estacionamiento')->on('estacionamiento');
            // $table->foreignId('id_carro_cajon')->references('id_carro')->on('carro');
            $table->foreignId('id_estacionamiento_cajon')->constrained('estacionamiento');
            $table->foreignId('id_carro_cajon')->constrained('carro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //eliminar llave foranea de la tabla cajon de estacionamiento
        Schema::table('cajon', function (Blueprint $table) {
            $table->dropForeign('id_estacionamiento_cajon');
            $table->dropForeign('id_carro_cajon');
        });
    }
};
