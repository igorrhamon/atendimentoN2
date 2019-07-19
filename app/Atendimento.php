<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $fillable = [
        'tecnico_id', 'inicioAtendimento', 'fimAtendimento','tempoDeAtendimento' ,'dataDoAtendimento','numeroChamado','hardDrive_id','hardDriveRecebido', 'location_id'
    ];

    public function tecnico(){
        return $this->hasOne('App\Tecnico','id','tecnico_id');
    }

    public function hardDrive(){
        return $this->hasOne('App\HardDrive','id','hardDrive_id');
    }

    public function locations(){
        return $this->belongsToMany('App\Location');
    }
    public function location(){
        return $this->hasOne('App\Location','id','location_id');
    }
}
