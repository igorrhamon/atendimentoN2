<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Location;
use App\Tecnico;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtendimentoController extends Controller
{
    public function iniciarAtendimentoForm($id){
        $user = User::findOrFail($id);
        $locations = Location::all();
        $tecnico = $user->tecnico;
        return view('tecnicos.iniciarAtendimento',compact('locations','tecnico'));
    }
    public function iniciarAtendimento(Request $request){
        $tecnico = Tecnico::findOrFail($request->id);
        $tecnico->status = 1;
        $inicioAtendimento = date('H:i:s', strtotime(now()));
        $atendimento = new Atendimento();
        $atendimento->inicioAtendimento = $inicioAtendimento;
        $atendimento->tecnico_id = $tecnico->id;
        $atendimento->save();
//        return $atendimento;
//        return $tecnico;
//        return $request;
        $tecnico->update($request->all('location_id'));
        return redirect('homeNews');
    }

    public function encerraAtendimento($id){
        $tecnico = Tecnico::findOrFail(Auth::user()->tecnico->id);
        $tecnico->status = 0;
        $atendimento = Atendimento::has('tecnico');
        $tecnico->save();
        return redirect('homeNews');
    }
}
