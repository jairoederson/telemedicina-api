<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('procedure')->nullable();
            $table->string('interconsultation')->nullable();
            $table->string('transfer')->nullable();
            $table->string('medical_rest_start')->nullable();
            $table->string('medical_rest_end')->nullable();
            $table->string('next_date')->nullable();
            $table->integer('query_id')->unsigned();

            $table->foreign('query_id')->references('id')->on('query_offlines');

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
        Schema::dropIfExists('procedures');
    }
}
