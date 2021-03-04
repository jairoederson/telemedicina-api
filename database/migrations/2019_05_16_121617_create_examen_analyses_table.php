<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_analysis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->unsigned();
            $table->text('descripcion')->nullable();
            $table->string('resultado')->nullable();
            $table->string('tipo_dato')->nullable();
            $table->string('valor')->nullable();
            $table->string('unidad')->nullable();
            $table->text('referencia')->nullable();
            $table->string('metodo')->nullable();
            $table->string('validado')->nullable();
            $table->string('aprobado')->nullable();
            $table->string('motivo')->nullable();
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
        Schema::dropIfExists('examen_analysis');
    }
}
