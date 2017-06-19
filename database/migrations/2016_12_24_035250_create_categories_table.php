<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('directory_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();

            $table->foreign('parent_id')->references('id')->on('categories');
            $table->foreign('directory_id')->references('id')->on('directories');
            $table->timestamps();
        });

        Schema::create('article_category',function(Blueprint $table){
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_category',function(Blueprint $table){
            $table->dropForeign(['article_id']);
            $table->dropForeign(['category_id']);
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['directory_id']);
        });
        Schema::dropIfExists('article_category');
        Schema::dropIfExists('categories');
    }
}
