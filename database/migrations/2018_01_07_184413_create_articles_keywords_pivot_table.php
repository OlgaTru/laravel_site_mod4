<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesKeywordsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_keyword', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('keyword_id')->unsigned()->index();
            $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade');
            $table->primary(['article_id', 'keyword_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_keyword');
    }
}
