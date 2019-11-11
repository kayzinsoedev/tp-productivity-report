<?php

namespace App\Postpress;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostPressDay extends Model
{
    use SoftDeletes;
    protected $table = 'post_press_days';

    protected $fillable = [
		'machine_id',
		'day_night',
		'day_running_hour',
		'day_actual_output',
		'day_actual_mr',
		'day_mr',
		'day_ave_mr',
    ];

    protected $primaryKey = 'id';

    public function postPress(){
        return $this->hasOne('App\Postpress');
    }
}
