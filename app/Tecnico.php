<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $fillable = [
        'status', 'user_id','remember_token','lunchTime','officeTime', 'tempoDeAtendimento',
    ];

    protected $hidden = ['password'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function newsRead(){
        return $this->belongsToMany('App\News');
    }
    public function atendimentos(){
        return $this->hasMany('App\Atendimento','tecnico_id');
    }
    public function atendimentosLast(){
//        return $this->hasMany('atendimentos');
        return $this->hasMany('App\Atendimento','tecnico_id')->where('fimAtendimento','=','NULL');
    }
    public function atendimentosHoje(){
        return $this->hasMany('App\Atendimento','tecnico_id')->where('dataDoAtendimento','=',date("Y-m-d",strtotime(now())));
    }
    public function ultimoAtendimentoAberto(){
        return $this->hasMany('App\Atendimento','tecnico_id')
            ->where('dataDoAtendimento','=',date("Y-m-d",strtotime(now())))
            ->where('fimAtendimento','=',NULL);
    }
    public function ultimoAtendimentoOntem(){
        return $this->hasMany('App\Atendimento','tecnico_id')
            ->where('dataDoAtendimento','==',date('Y-m-d',strtotime("-1 days")))
//            ->where('fimAtendimento','=',NULL)
            ;
    }
}
