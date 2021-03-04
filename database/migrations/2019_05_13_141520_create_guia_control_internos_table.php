<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaControlInternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia_control_internos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_solicitud')->unsigned();
            $table->integer('toma_muestras_id')->unsigned();
            $table->string('origen')->nullable();
            $table->string('destino')->nullable();
            $table->string('repartidor')->nullable();
            $table->text('comentario')->nullable();
            $table->text('criterio_rechazo')->nullable();
            $table->string('hora_recepcion')->nullable();
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
        Schema::dropIfExists('guia_control_internos');
    }
}
