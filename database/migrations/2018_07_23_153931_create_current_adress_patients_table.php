<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentAdressPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_adress_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ubigeo_id')->unsigned();
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
        Schema::dropIfExists('current_adress_patients');
    }
}
