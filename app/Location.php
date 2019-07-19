<?php

namespace App;

use Carbon\Carbon;
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
        return $this->hasMany('App\Atendimento');
    }
    public function atendimentosDeHojeAbertos(){
        return $this->hasMany('App\Atendimento')
            ->where('dataDoAtendimento','=',Carbon::now('America/Sao_Paulo')->format('Y-m-d'))
            ->where('fimAtendimento','=',NULL);
    }
}
