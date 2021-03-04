<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueryOfflinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('query_offlines', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('state', array('pendiente triaje', 'pendiente atencion', 'en consulta', 'atendido'));
            // $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->integer('voucher_id')->unsigned();
            // $table->integer('historial_id')->unsigned();
            $table->integer('receipt_id')->unsigned();

            $table->timestamps();
            // $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            // $table->foreign('historial_id')->references('id')->on('medical_histories');
            // $table->foreign('treatment_id')->references('id')->on('treatments');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('query_offlines');
    }
}
