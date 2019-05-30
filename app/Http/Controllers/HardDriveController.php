<?php

namespace App\Http\Controllers;

use App\HardDrive;
use Illuminate\Http\Request;

class HardDriveController extends Controller
{
    public function listarHD(){
        $HDs = HardDrive::all();
        return view('HD.listarHD',compact('HDs'));
    }

    public function receberHD($id){
        $HD = HardDrive::findOrFail($id);

        $HD->avaliable = TRUE;
        $HD->save();

        $ultimoAtendimento =$HD->atendimento->last();
        $ultimoAtendimento->hardDriveRecebido = TRUE;
        $ultimoAtendimento->save();
//        $HD->atendimento->hardDriveRecebido
//        return $HD;
        return redirect(route('listarHD'));
    }
}
