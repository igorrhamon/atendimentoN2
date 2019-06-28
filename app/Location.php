<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'id', 'name', 'address','supervisor_id','latitude','longitude'
    ];

    public function supervisor(){
        return $this->hasOne('App\Supervisor','id','supervisor_id');
    }
    public function tecnicos(){
        return $this->hasMany('App\Tecnico','location_id');
    }
    public function atendimentos(){
        return $this->belongsToMany('App\Atendimento');
    }
}
