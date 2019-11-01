<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPress extends Model
{
    protected $table = 'post_presses';

    protected $fillable = [
		'machine_id',
		'day_night',
		'day_running_hour',
		'day_actual_output',
		'day_actual_mr',
		'day_mr',
		'day_ave_mr',
		'night_running_hour',
		'night_actual_output',
		'night_actual_mr',
		'night_mr',
		'night_ave_mr',
    ];

    protected $primaryKey = 'id';
}
