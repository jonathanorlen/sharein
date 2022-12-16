<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->references('id')->on('users')->cascadeOnDelete();
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('profile_title')->nullable();
            $table->text('bio')->nullable();
            $table->text('about')->nullable();
            $table->string('address',200)->nullable();
            $table->text('maps')->nullable();
            $table->string('background',20)->default('#ffffff')->nullable();
            $table->string('background_color',20)->default('#0751D8')->nullable();
            $table->string('color',20)->default('#ffffff')->nullable();
            $table->integer('link_limit')->default(3)->nullable();
            $table->string('seo_title',350)->nullable();
            $table->string('seo_description',350)->nullable();
            $table->string('facebook_pixel_id',60)->nullable();
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
        Schema::dropIfExists('page');
    }
}
