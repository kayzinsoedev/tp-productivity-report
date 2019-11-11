<?php

namespace App\Postpress;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machines';
    protected $primaryKey = 'id';


    public function postPress(){
        return $this->hasMany('App\Postpress\PostPress');
    }
}
