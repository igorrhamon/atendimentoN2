<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $fillable = [
        'status', 'location_id', 'user_id','remember_token','lunchTime','officeTime'
    ];

    protected $hidden = ['password'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function location(){
        return $this->hasOne('App\Location','id');
    }
    public function newsRead(){
        return $this->belongsToMany('App\News');
    }
    public function atendimentos(){
        return $this->hasMany('App\Atendimento','tecnico_id');
    }
    public function atendimentosLast(){
        return $this->hasMany('App\Atendimento','tecnico_id');
    }


}
