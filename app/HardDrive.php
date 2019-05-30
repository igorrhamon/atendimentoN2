<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HardDrive extends Model
{
    protected $fillable = [
        'endLog', 'modelo', 'user_id', 'avaliable'
    ];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function atendimento(){
        return $this->hasMany('App\Atendimento','hardDrive_id','id');
    }
    public function ultimoAtendimentoAberto(){
        return $this->hasMany('App\Atendimento','hardDrive_id','id');
    }
}
