<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriajePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triaje_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blood_pressure')->nullable();
            $table->string('breathing_frequency')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('temperature')->nullable();
            $table->string('weight')->nullable();
            $table->string('size')->nullable();
            $table->integer('query_offline_id')->unsigned()->nullable();
            $table->integer('query_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('query_offline_id')->references('id')->on('query_offlines');
            $table->foreign('query_id')->references('id')->on('queries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('triaje_patients');
    }
}
