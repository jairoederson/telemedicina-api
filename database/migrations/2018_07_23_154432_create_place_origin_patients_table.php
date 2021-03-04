<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceOriginPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_origin_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ubigeo_id')->unsigned()->nullable();
            $table->integer('patient_id')->unsigned();

            $table->timestamps();

            $table->foreign('ubigeo_id')->references('id')->on('ubigeos');
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_origin_patients');
    }
}
