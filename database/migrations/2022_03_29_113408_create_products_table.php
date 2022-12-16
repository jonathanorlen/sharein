<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->foreignId('pagesId')->references('id')->on('pages')->cascadeOnDelete();
            $table->foreignId('userId')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('categoryId')->nullable()->references('id')->on('categories')->nullable()->cascadeOnDelete();
            $table->string('image', 350)->nullable()->default('text');
            $table->text('description')->nullable();
            $table->integer('price')->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('products');
    }
}
