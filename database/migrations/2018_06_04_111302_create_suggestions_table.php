<?php
use App\Suggestion;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('suggestion');
            $table->string('email');
            $table->integer('category_suggestion_id')->unsigned();
            $table->string('state')->default(Suggestion::SUGGESTION_ACTIVE);
            $table->timestamps();

            $table->foreign('category_suggestion_id')->references('id')->on('category_suggestions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suggestions');
    }
}
