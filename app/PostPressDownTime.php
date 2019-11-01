<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPressDownTime extends Model
{
    protected $table = 'post_press_down_times';

    protected $fillable = [
		'record_id',
		'day_off',
		'day_eng',
		'day_cs',
		'day_bin',
		'day_sch',
		'day_cli',
		'day_no_job',
		'night_off',
		'night_eng',
		'night_cs',
		'night_bin',
    'night_sch',
    'night_cli',
    'night_no_job'
    ];

    protected $primaryKey = 'id';
}
