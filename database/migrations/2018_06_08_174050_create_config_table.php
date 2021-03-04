<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',50)->nullable();
            $table->string('description',500)->nullable();
            $table->decimal('price', 5, 2);
            $table->decimal('doctor_price', 5, 2);
            $table->integer('estado')->unsigned();
            $table->timestamps();
            // $table->string('estado',1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
