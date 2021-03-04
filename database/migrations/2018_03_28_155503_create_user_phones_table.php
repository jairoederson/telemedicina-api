<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('number');
            $table->string('description')->nullable();

            $table->smallinteger('estado')->unsigned()->default(1);
            $table->integer('usuario_created_id')->nullable();
            $table->integer('usuario_upd_id')->nullable();
            $table->string('terminal')->nullable();
            $table->string('terminal_upd')->nullable();

            $table->integer('type_phones_id')->unsigned();
            $table->integer('users_id')->unsigned();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('type_phones_id')->references('id')->on('type_phones');
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
        Schema::dropIfExists('user_phones');
    }
}
