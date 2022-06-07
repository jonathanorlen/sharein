<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('itemId')->nullable();
            $table->string('type',50)->nullable();
            $table->string('country',70)->nullable();
            $table->string('city',70)->nullable();
            $table->string('device',35)->nullable();
            $table->string('platform',35)->nullable();
            $table->string('browser',35)->nullable();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
