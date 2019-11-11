<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPressDownTimeDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_press_down_time_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('record_id');
            $table->string('day_off')->nullable();
            $table->string('day_eng')->nullable();
            $table->string('day_cs')->nullable();
            $table->string('day_bin')->nullable();
            $table->string('day_sch')->nullable();
            $table->string('day_cli')->nullable();
            $table->string('day_no_job')->nullable();
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
        Schema::dropIfExists('post_press_down_times');
    }
}
