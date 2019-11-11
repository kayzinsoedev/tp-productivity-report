<?php

namespace App\Postpress;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostPressDownTimeDay extends Model
{
    use SoftDeletes;
    protected $table = 'post_press_down_time_days';

    protected $fillable = [
  		'record_id',
  		'day_off',
  		'day_eng',
  		'day_cs',
  		'day_bin',
  		'day_sch',
  		'day_cli',
  		'day_no_job',
    ];

    protected $primaryKey = 'id';

    public function postPress(){
        return $this->hasOne('App\Postpress');
    }
}
