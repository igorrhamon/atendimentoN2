<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title','content','supervisor_id'
    ];
//    protected $hidden =['supervisor_id'];
    public function supervisor(){
        return $this->belongsTo('App\Supervisor');
    }

    public function whoRead(){
        return $this->belongsToMany('App\Tecnico');
    }
}
