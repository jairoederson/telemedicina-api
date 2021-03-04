<?php
use App\ImageSuggestion;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_suggestions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('state')->default(ImageSuggestion::IMAGE_SUGGESTION_ACTIVE);
            $table->integer('suggestion_id')->unsigned();
            $table->timestamps();

            $table->foreign('suggestion_id')->references('id')->on('suggestions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_suggestions');
    }
}
