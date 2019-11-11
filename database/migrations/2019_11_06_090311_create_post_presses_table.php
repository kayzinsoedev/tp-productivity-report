<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_presses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('day_id')->nullable();
            $table->integer('night_id')->nullable();
            $table->integer('day_downtime_id')->nullable();
            $table->integer('night_downtime_id')->nullable();
            $table->integer('machine_id');
            $table->softDeletes();
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
        Schema::dropIfExists('post_presses');
    }
}
