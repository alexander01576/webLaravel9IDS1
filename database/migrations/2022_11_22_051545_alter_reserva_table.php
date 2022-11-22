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
        Schema::table('reserva', function (Blueprint $table) {
            $table->foreignId('id_cliente_reserva')->constrained('cliente');
            $table->foreignId('id_cajon_reserva')->constrained('cajon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reserva', function (Blueprint $table) {
            $table->dropForeign('id_cliente_reserva');
            $table->dropForeign('id_cajon_reserva');
        });
    }
};
