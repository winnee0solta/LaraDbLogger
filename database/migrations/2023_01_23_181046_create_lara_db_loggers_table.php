<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lara_db_loggers', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->text('trace');
            $table->string('file')->nullable();
            $table->integer('line')->nullable();
            $table->string('class')->nullable();
            $table->string('function')->nullable();
            $table->string('path')->nullable();
            $table->string('method')->nullable();
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->text('input')->nullable();
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
        Schema::dropIfExists('lara_db_loggers');
    }
};
