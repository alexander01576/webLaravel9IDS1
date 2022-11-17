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
        // agregar llave foranea a la tabla administrador de estacionamiento
        Schema::table('administrador', function (Blueprint $table) {
            $table->foreignId('id_estacionamiento_administrador')->references('id_estacionamiento')->on('estacionamiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //eliminar llave foranea de la tabla administrador de estacionamiento
        Schema::table('administrador', function (Blueprint $table) {
            $table->dropForeign('id_estacionamiento_administrador');
        });
    }
};
