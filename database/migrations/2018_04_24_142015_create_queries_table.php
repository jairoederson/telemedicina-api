<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->date('date');
            $table->decimal('price', 5, 2);
            $table->integer('duration')->nullable();
            $table->smallinteger('state')->unsigned()->default(1);
            $table->string('symptom');
            $table->string('message', 500);
            $table->string('mode');
            $table->string('video')->nullable();
            $table->string('appreciation', 500);
            $table->longText('imagesSymptom', 40000000)->nullable();
            $table->longText('documents', 40000000)->nullable();

            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queries');
    }
}
