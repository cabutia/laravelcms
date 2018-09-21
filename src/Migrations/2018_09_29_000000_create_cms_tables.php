<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCMSTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config = config('cms');

        Schema::create($config['tables_prefix'] . 'languages', function (Blueprint $table) use ($config) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create($config['tables_prefix'] . 'fragments', function (Blueprint $table) use ($config){
            $table->increments('id');
            $table->string('key');
            $table->string('value');
            $table->unsignedInteger('language_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('language_id')->references('id')->on($config['tables_prefix'] . 'languages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $config = config('cms');
        Schema::dropIfExists($config['tables_prefix'] . 'fragments');
        Schema::dropIfExists($config['tables_prefix'] . 'languages');
    }
}
