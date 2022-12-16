<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Scalar\String_;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pagesId')->references('id')->on('pages')->cascadeOnDelete();
            $table->foreignId('userId')->references('id')->on('users')->cascadeOnDelete();
            $table->string('facebook', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('whatsapp', 100)->nullable();
            $table->string('line', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->string('tiktok', 100)->nullable();
            $table->string('telegram', 100)->nullable();
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
        Schema::dropIfExists('social_media');
    }
}
