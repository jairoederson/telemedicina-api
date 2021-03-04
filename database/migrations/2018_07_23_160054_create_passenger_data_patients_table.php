<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengerDataPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('type_passengers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'))->default('1');
          $table->timestamps();
      });

        Schema::create('passenger_data_patients', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('type_passenger_id')->unsigned()->nullable();
            $table->integer('type_document_id')->unsigned()->nullable();
            $table->integer('patient_id')->unsigned();
            $table->string('name_passenger')->nullable();
            $table->string('nro_document')->nullable();
            $table->timestamps();

            $table->foreign('type_passenger_id')->references('id')->on('type_passengers');
            $table->foreign('type_document_id')->references('id')->on('type_documents');
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
        Schema::dropIfExists('passenger_data_patients');
    }
}
