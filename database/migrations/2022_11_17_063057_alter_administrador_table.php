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
        Schema::table('administrador', function (Blueprint $table) {
            $table->foreignId('id_estacionamiento_administrador')->constrained('estacionamiento');
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
