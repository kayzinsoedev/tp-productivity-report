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
            $table->integer('machine_id');
            $table->string('day_night');
            $table->string('day_running_hour');
            $table->string('day_actual_output');
            $table->string('day_actual_mr');
            $table->string('day_mr');
            $table->string('day_ave_mr');
            $table->string('night_running_hour');
            $table->string('night_actual_output');
            $table->string('night_actual_mr');
            $table->string('night_mr');
            $table->string('night_ave_mr');
            // $table->string('day_ave_mr');
            // $table->string('day_ave_mr');
            // $table->string('day_ave_mr');
            // $table->integer('machine_id');
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
