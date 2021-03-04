<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiologicalFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biological_functions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appetite')->nullable();
            $table->string('thirst')->nullable();
            $table->string('dream')->nullable();
            $table->string('urine')->nullable();
            $table->string('depositions')->nullable();
            $table->integer('query_id')->unsigned();

            $table->foreign('query_id')->references('id')->on('queries');

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
        Schema::dropIfExists('biological_functions');
    }
}
