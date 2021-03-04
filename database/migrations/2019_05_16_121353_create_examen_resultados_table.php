<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('examen_id')->unsigned();
            $table->integer('id_solicitud')->unsigned();
            $table->string('valor')->nullable();
            $table->string('validado')->nullable();
            $table->string('aprobado')->nullable();
            $table->string('comentario')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('examen_resultados');
    }
}
