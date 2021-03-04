<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_others', function (Blueprint $table) {
            $table->increments('id');
            $table->string('head_note',150)->nullable();
            $table->string('body_note',500)->nullable();
            $table->integer('estado')->unsigned();
            $table->integer('table_id')->unsigned()->nullable();
            // $table->integer('table_id')->nullable();
            $table->string('category_note',50)->nullable();
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
        Schema::dropIfExists('note_others');
    }
}
