<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGinecologicalRecordPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ginecological_record_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menarquia');
            $table->string('regular_rule');
            $table->string('r_caternial');
            $table->string('rs');
            $table->string('fur');
            $table->string('fpp');
            $table->string('disminorrea');
            $table->string('nro_gestaciones');
            $table->string('fup');
            $table->string('pariedad');
            $table->string('cesareas');
            $table->string('pap');
            $table->string('mamografia');
            $table->string('mac');
            $table->string('otros');
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
        Schema::dropIfExists('ginecological_record_patients');
    }
}
