<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFbStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fb_store', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('group',255)->nullable();
            $table->string('url',255)->nullable();
            $table->string('logo_img_url',255)->nullable();
            $table->string('publish_time',255)->nullable();
            $table->string('description',255)->nullable();
            $table->string('main_img_or_video',255)->nullable();
            $table->string('emoji',255)->nullable();
            $table->string('views',255)->nullable();
            $table->string('comments',255)->nullable();
            $table->string('share',255)->nullable();
            $table->string('ratio',255)->nullable();
            $table->integer('star');
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
        Schema::dropIfExists('fb_store');
    }
}
