<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordPathologicalFamilyPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_pathological_family_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CIE');
            $table->string('description');
            $table->string('familiar');
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
        Schema::dropIfExists('record_pathological_family_patients');
    }
}
