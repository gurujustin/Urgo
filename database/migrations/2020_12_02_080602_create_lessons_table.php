<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(1);  
            $table->integer('category')->nullable();  
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keytakeaway')->nullable();
            $table->text('action')->nullable();
            $table->text('resources')->nullable();
            $table->text('downloads')->nullable();
            $table->text('video')->nullable();
            $table->integer('duration')->nullable();
            $table->text('time_stamp')->nullable();   
            $table->text('tile_title')->nullable();
            $table->text('tile_description')->nullable();
            $table->text('tile_image')->nullable();
            $table->text('tile_video')->nullable();
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
        Schema::dropIfExists('lessons');
    }
}
