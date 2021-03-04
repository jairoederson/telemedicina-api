<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ruc');
            $table->integer('number_phone');
            $table->integer('number_workers');
            $table->integer('ubigeo_id');
            $table->string('address', 500);
            $table->string('address_extra_info')->nullable();
            $table->string('location', 500);
            $table->string('industry')->nullable();

            $table->string('about', 500);
            $table->string('estado', 1);
            $table->string('name_contact', 50);
            $table->string('last_name_contact', 50);
            $table->string('position_contact', 50);
            $table->string('telephone_contact', 15);
            $table->string('email_contact', 25);
            $table->string('url_image', 100)->nullable();
            $table->string('bloodType', 100)->default("O+");
            
            $table->timestamps();
            // $table->engine = 'InnoDB';
        });

        Schema::create('degree_instructions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->enum('state', array('1', '0'))->default('1');

            $table->timestamps();
        });

        Schema::create('civil_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->enum('state', array('1', '0'))->default('1');

            $table->timestamps();
        });

        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ocupation')->nullable();
            $table->integer('num_attentions')->default(0);
            $table->integer('users_id')->unsigned();
            $table->integer('degree_instruction_id')->nullable()->unsigned();
            $table->integer('civil_status_id')->nullable()->unsigned();
            $table->string('work_center')->nullable();
            $table->string('card_id')->nullable();
            $table->string('card_to_use')->nullable();
            $table->longText('temp_symptom')->nullable();
            $table->longText('temp_message')->nullable();
            $table->decimal('weight', 4, 2)->nullable();
            $table->decimal('size', 4, 2)->nullable();
            $table->string('allergies')->nullable();
            $table->longText('temp_imageSymptom',400000)->nullable();
            $table->longText('temp_documents',400000)->nullable();
            $table->longText('temp_key_symptoms')->nullable();
            $table->longText('temp_imageSymptomBase64',400000)->nullable();
            $table->longText('temp_documents_base64',400000)->nullable();
            $table->integer('call_state')->default(0);
            $table->string('bloodType', 100)->default("O+");

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('degree_instruction_id')->references('id')->on('degree_instructions');
            $table->foreign('civil_status_id')->references('id')->on('civil_status');
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
        Schema::dropIfExists('patients');
    }
}
