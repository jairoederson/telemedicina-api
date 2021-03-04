<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralRecordPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('general_prenatals', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'));
          $table->timestamps();
      });

      Schema::create('general_births', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'));
          $table->timestamps();
      });

      Schema::create('general_immunizations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'));
          $table->timestamps();
      });

      Schema::create('harmful_habits', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'));
          $table->timestamps();
      });
        Schema::create('general_record_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medicaments')->nullable();
            $table->string('RAM')->nullable();
            $table->string('occupational')->nullable();
            $table->string('general_prenatal_id')->nullable();
            $table->string('general_birth_id')->nullable();
            $table->string('general_immunization_id')->nullable();
            $table->string('harmful_habits_id')->nullable();
            $table->integer('patient_id')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('general_record_patients');
    }
}
