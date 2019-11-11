<?php

namespace App\Postpress;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostPressNight extends Model
{
    use SoftDeletes;
    protected $table = 'post_press_nights';

    protected $fillable = [
    'machine_id',
    'day_night',
    'night_running_hour',
    'night_actual_output',
    'night_actual_mr',
    'night_mr',
    'night_ave_mr',
    ];

    protected $primaryKey = 'id';

    public function postPress(){
        return $this->hasOne('App\Postpress');
    }
}
