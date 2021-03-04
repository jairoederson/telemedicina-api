<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalDataPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('blood_types', function (Blueprint $table) {
          $table->increments('id');

          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'))->default('1');

          $table->timestamps();
      });
        Schema::create('medical_data_patients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('factor_rh')->nullable();
            $table->integer('blood_type_id')->unsigned()->nullable();
            $table->integer('medical_history_id')->unsigned();

            $table->timestamps();

            $table->foreign('blood_type_id')->references('id')->on('blood_types');
            $table->foreign('medical_history_id')->references('id')->on('medical_histories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_data_patients');
    }
}
