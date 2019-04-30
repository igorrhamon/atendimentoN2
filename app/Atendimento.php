<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $fillable = [
        'tecnico_id', 'inicioAtendimento', 'fimAtendimento','tempoDeAtendimento'
    ];

    public function tecnico(){
        return $this->hasOne('App\Tecnico','id','tecnico_id');
    }
}
