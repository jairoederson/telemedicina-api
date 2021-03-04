<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('type_vouchers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'))->default('1');
          $table->timestamps();
      });

      Schema::create('type_concept_transactions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'))->default('1');
          $table->timestamps();
      });

      Schema::create('type_ums', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->enum('state', array('1', '0'))->default('1');
          $table->timestamps();
      });
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->enum('state', array('pendiente', 'cancelado', 'anulado'))->default('pendiente');
            $table->string('nro_voucher')->nullable();
            $table->string('code_bar')->nullable();
            $table->decimal('price', 4, 2);
            $table->integer('quantity')->unsigned();
            $table->integer('concept_id')->unsigned();
            $table->integer('um_id')->unsigned();
            $table->integer('type_voucher_id')->unsigned();
            $table->integer('patient_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('concept_id')->references('id')->on('type_concept_transactions');
            $table->foreign('um_id')->references('id')->on('type_ums');
            $table->foreign('type_voucher_id')->references('id')->on('type_vouchers');
            $table->foreign('patient_id')->references('id')->on('patients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
