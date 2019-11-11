<?php

namespace App\Postpress;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostPressDownTimeNight extends Model
{
    use SoftDeletes;
    protected $table = 'post_press_down_time_nights';

    protected $fillable = [
        'record_id',
        'night_off',
        'night_eng',
        'night_cs',
        'night_bin',
        'night_sch',
        'night_cli',
        'night_no_job'
    ];

    protected $primaryKey = 'id';

    public function postPress(){
        return $this->hasOne('App\Postpress');
    }
}
