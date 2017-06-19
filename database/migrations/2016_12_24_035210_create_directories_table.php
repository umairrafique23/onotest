<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('directory_type_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->foreign('directory_type_id')->references('id')->on('directory_types');
            $table->timestamps();
        });

        Schema::table('articles', function (Blueprint $table) {

            $table->integer('directory_id')->unsigned();
            $table->foreign('directory_id')->references('id')->on('directories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['directory_id']);
            $table->dropColumn('directory_id');
        });
        Schema::dropIfExists('directories');
    }
}
