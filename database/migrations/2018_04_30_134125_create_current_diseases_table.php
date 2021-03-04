<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('type_informants', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('description')->nullable();
          $table->string('state')->nullable();

          $table->timestamps();
      });

      Schema::create('appetites', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('description')->nullable();
          $table->string('state')->nullable();

          $table->timestamps();
      });

      Schema::create('dreams', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('description')->nullable();
          $table->string('state')->nullable();

          $table->timestamps();
      });

      Schema::create('depositions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('description')->nullable();
          $table->string('state')->nullable();

          $table->timestamps();
      });

      Schema::create('thirsts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('description')->nullable();
          $table->string('state')->nullable();

          $table->timestamps();
      });

      Schema::create('urines', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('description')->nullable();
          $table->string('state')->nullable();

          $table->timestamps();
      });

      Schema::create('current_diseases', function (Blueprint $table) {
          $table->increments('id');
          $table->string('reason_consultation')->nullable();
          $table->string('sign_sympthoms')->nullable();
          $table->string('start_form')->nullable();
          $table->string('sickness_time')->nullable();
          $table->string('type_informant')->nullable();
          $table->string('chronological_story')->nullable();
          $table->integer('type_informant_id')->unsigned();
          $table->integer('appetite_id')->unsigned();
          $table->integer('dream_id')->unsigned();
          $table->integer('deposition_id')->unsigned();
          $table->integer('thirst_id')->unsigned();
          $table->integer('urine_id')->unsigned();
          $table->integer('query_id')->unsigned();

          $table->foreign('type_informant_id')->references('id')->on('type_informants');
          $table->foreign('appetite_id')->references('id')->on('appetites');
          $table->foreign('dream_id')->references('id')->on('dreams');
          $table->foreign('deposition_id')->references('id')->on('depositions');
          $table->foreign('thirst_id')->references('id')->on('thirsts');
          $table->foreign('urine_id')->references('id')->on('urines');
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
        Schema::dropIfExists('current_diseases');
    }
}
