<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medicine')->nullable();
            $table->string('treatment')->nullable();
            $table->string('way_administration')->nullable();
            $table->string('presentation')->nullable();
            $table->string('dose')->nullable();
            $table->string('quantity')->nullable();
            $table->integer('treatment_id')->unsigned();
            $table->decimal('price', 8, 2)->unsigned();
            $table->integer('sku')->unsigned();
            $table->string('um')->nullable();

            $table->foreign('treatment_id')->references('id')->on('treatments');

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
        Schema::dropIfExists('medicaments');
    }
}
