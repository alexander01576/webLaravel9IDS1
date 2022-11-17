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
        // agregar llave foranea a la tabla carro de tipo_carro
        Schema::table('carro', function (Blueprint $table) {
            $table->foreignId('id_tipo_carro')->references('id_tipo')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //eliminar llave foranea de la tabla carro de tipo_carro
        Schema::table('carro', function (Blueprint $table) {
            $table->dropForeign('id_tipo_carro');
        });
    }
};
