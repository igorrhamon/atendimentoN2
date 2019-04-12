<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = [

    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function location(){
        return $this->hasMany('App\Location');
    }
    public function news(){
        return $this->hasMany('App\News','supervisor_id');
    }

}
