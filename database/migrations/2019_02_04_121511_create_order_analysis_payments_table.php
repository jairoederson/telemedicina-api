<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAnalysisPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_analysis_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->decimal('price', 4, 2);
            $table->string('description');
            $table->enum('state', ['0', '1', '2', '3']);
            
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            
            // Estados del pago de orden de analisis
            /**
             * 0 - orden de analisis no visto por el paciente
             * 1 - orden de analisis visto por el paciente
             * 2 - orden de analisis pagado
             * 3 - orden de analisis vencido o rechazado
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_analysis_payments');
    }
}
