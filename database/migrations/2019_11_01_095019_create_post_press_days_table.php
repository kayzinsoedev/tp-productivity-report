<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPressDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_press_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('machine_id');
            $table->string('day_night');
            $table->string('day_running_hour')->nullable();
            $table->string('day_actual_output')->nullable();
            $table->string('day_actual_mr')->nullable();
            $table->string('day_mr')->nullable();
            $table->string('day_ave_mr')->nullable();
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
