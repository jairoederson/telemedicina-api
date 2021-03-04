<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSymptomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->smallinteger('estado')->unsigned()->default(1);
            $table->integer('usuario_created_id')->nullable();
            $table->integer('usuario_upd_id')->nullable();
            $table->string('terminal')->nullable();
            $table->string('terminal_upd')->nullable();
            $table->integer('diseas_id')->unsigned()->nullable();

            $table->foreign('diseas_id')->references('id')->on('diseases');
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
        Schema::dropIfExists('symptom');
    }
}
