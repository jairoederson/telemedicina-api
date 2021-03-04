<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_solicitud')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('informe_resultados');
    }
}
