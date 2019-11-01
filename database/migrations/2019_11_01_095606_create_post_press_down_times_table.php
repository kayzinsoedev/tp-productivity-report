<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPressDownTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_press_down_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('record_id');
            $table->string('day_off');
            $table->string('day_eng');
            $table->string('day_cs');
            $table->string('day_bin');
            $table->string('day_sch');
            $table->string('day_cli');
            $table->string('day_no_job');
            $table->string('night_off');
            $table->string('night_eng');
            $table->string('night_cs');
            $table->string('night_bin');
            $table->string('night_sch');
            $table->string('night_cli');
            $table->string('night_no_job');
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
