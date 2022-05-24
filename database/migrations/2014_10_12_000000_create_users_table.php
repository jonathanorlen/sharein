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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domain');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('profile_title')->nullable();
            $table->text('bio')->nullable();
            $table->text('about')->nullable();
            $table->string('address',200)->nullable();
            $table->text('maps')->nullable();
            $table->string('background',20)->nullable();
            $table->string('background_color',20)->default('#ffffff')->nullable();
            $table->string('color',20)->nullable();
            $table->integer('link_limit')->default(3)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
