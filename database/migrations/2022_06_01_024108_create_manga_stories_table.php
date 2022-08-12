<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangaStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manga_stories', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->integer("sum_chapter")->nullable();
            $table->string("author")->nullable();
            $table->json("category_ids")->nullable();
            $table->string("description")->nullable();
            $table->string("avatar")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manga_stories');
    }
}
