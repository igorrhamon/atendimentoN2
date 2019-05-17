<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supervisor extends Model
{
    use Notifiable;

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
