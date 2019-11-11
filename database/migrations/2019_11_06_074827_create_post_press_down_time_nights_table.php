<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPressDownTimeNightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_press_down_time_nights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('record_id');
            $table->string('night_off')->nullable();
            $table->string('night_eng')->nullable();
            $table->string('night_cs')->nullable();
            $table->string('night_bin')->nullable();
            $table->string('night_sch')->nullable();
            $table->string('night_cli')->nullable();
            $table->string('night_no_job')->nullable();
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
        Schema::dropIfExists('post_press_down_time_nights');
    }
}
