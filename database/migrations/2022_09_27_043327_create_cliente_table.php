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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nombre:_cliente');
            $table->string('ap_pat_cliente');
            $table->string('ap_mat_cliente');
            $table->string('email_cliente');
            $table->bigInteger('celular_cliente');
            $table->string('estatus_cliente');
            $table->string('imagen_cliente')->nullable();
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
        Schema::dropIfExists('cliente');
    }
};
