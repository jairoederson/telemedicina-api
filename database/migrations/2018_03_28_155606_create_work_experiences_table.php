<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institution');
            $table->string('activity');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('doctors_id')->unsigned();
            $table->smallinteger('estado')->unsigned()->default(1);
            $table->integer('usuario_created_id')->nullable();
            $table->integer('usuario_upd_id')->nullable();
            $table->string('terminal')->nullable();
            $table->string('terminal_upd')->nullable();

            $table->foreign('doctors_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('work_experiences');
    }
}
