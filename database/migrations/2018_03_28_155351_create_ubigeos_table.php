<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbigeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubigeos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('countries_id')->unsigned();
            $table->string('ubigeo');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->smallinteger('estado')->unsigned()->default(1);
            $table->integer('usuario_created_id')->nullable();
            $table->integer('usuario_upd_id')->nullable();
            $table->string('terminal')->nullable();
            $table->string('terminal_upd')->nullable();
            $table->timestamps();

            $table->foreign('countries_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubigeos');
    }
}
