<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HardDrive extends Model
{
    protected $fillable = [
        'endLog', 'modelo', 'user_id', 'avaliable'
    ];

    public function user(){
        $this->hasOne('App\User');
    }
}
