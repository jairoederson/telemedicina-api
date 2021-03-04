<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTomaMuestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toma_muestras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('id_solicitud')->unsigned();
            $table->string('code');
            $table->string('material')->nullable();
            $table->string('codigo_barra')->nullable();
            $table->string('examen')->nullable();
            $table->string('state')->nullable();
            $table->string('priority')->nullable();
            $table->integer('status')->default(0);
            $table->string('motivo')->nullable();
            $table->text('comentario')->nullable();
            $table->integer('eliminado')->default(0);
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
        Schema::dropIfExists('toma_muestras');
    }
}
