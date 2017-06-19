<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('key')->index();
            $table->string('value');
            $table->string('prefix');
            $table->string('input_type');
            $table->text('description');
            $table->boolean('editable')->comment = "Whether the Setting would be shown in forms";
            $table->integer('weight')->default(0)->comment = "Used for sorting";
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
        Schema::dropIfExists('settings');
    }
}
