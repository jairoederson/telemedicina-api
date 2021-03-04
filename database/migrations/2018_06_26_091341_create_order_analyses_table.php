<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_analysis', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('patient_id')->unsigned();
          $table->integer('doctor_id')->unsigned();
          $table->string('state');
          $table->string('state_notification');
          $table->string('code');
          $table->string('analysis');
          $table->string('um');
          $table->string('type_analisys');
          $table->string('price');

          $table->string('status')->default(0);
          $table->string('priority')->default(1);

          $table->foreign('patient_id')->references('id')->on('patients');
          $table->foreign('doctor_id')->references('id')->on('doctors');

          $table->timestamps();
        });
    }
    /**
     * state_notification
         * 0 - orden de analisis no visto por el paciente
         * 1 - orden de analisis visto por el paciente
         * 2 - orden de analisis pagado
         * 3 - orden de analisis vencido o rechazado
    */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_analysis');
    }
}
