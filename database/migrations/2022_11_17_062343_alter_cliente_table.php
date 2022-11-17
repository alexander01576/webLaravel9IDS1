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
        // agregar llave foranea a la tabla cliente
        Schema::table('cliente', function (Blueprint $table) {
            $table->foreignId('id_carro_cliente')->references('id_carro')->on('carro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //eliminar llave foranea de la tabla cliente
        Schema::table('cliente', function (Blueprint $table) {
            $table->dropForeign('id_carro_cliente');
        });
    }
};
