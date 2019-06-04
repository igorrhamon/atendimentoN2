<?php

namespace App\Http\Controllers;

use App\HardDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HardDriveController extends Controller
{
    public function listarHD(){
        $HDs = HardDrive::all();
        return view('HD.listarHD',compact('HDs'));
    }

    public function receberHD($id){
        $HD = HardDrive::findOrFail($id);
        $HD->user_id = Auth::id();
        $HD->avaliable = TRUE;
        $HD->save();

        $ultimoAtendimento =$HD->atendimento->last();
        $ultimoAtendimento->hardDriveRecebido = TRUE;
        $ultimoAtendimento->save();
        return redirect(route('listarHD'));
    }
}
