<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('general_status', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('description')->nullable();
          $table->enum('state', array('1', '0'))->default('1');
          $table->timestamps();
      });

      Schema::create('physical_exams', function (Blueprint $table) {
          $table->increments('id');
          $table->string('consciousness_state')->nullable();
          $table->string('physical_examination')->nullable();
          $table->integer('query_id')->unsigned();
          $table->integer('general_status_id')->unsigned();

          $table->foreign('query_id')->references('id')->on('query_offlines');
          $table->foreign('general_status_id')->references('id')->on('general_status');

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
        Schema::dropIfExists('physical_exams');
    }
}
