<?php

namespace App\Postpress;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostPress extends Model
{
    use SoftDeletes;
    protected $table = 'post_presses';

    protected $fillable = [
    		'day_id',
    		'night_id',
    		'day_downtime_id',
    		'night_downtime_id',
        'machine_id',
      ];

    protected $primaryKey = 'id';

    public function postPressDay(){
        return $this->hasOne('App\Postpress\PostPressDay','id');
    }
    public function postPressNight(){
        return $this->hasOne('App\Postpress\PostPressNight','id');
    }
    public function postPressDownTimeDay(){
        return $this->hasOne('App\Postpress\PostPressDownTimeDay','id');
    }
    public function PostPressDownTimeNight(){
        return $this->hasOne('App\Postpress\PostPressDownTimeNight','id');
    }

    public function machine(){
        return $this->belongsTo('App\Postpress\Machine');
    }
}
