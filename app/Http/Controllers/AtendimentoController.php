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
//        $inicioAtendimento = date('H:i:s', strtotime(now()));
        $inicioAtendimento = date('H:i:s', strtotime(now()));
        $atendimento = new Atendimento();
        $atendimento->inicioAtendimento = $inicioAtendimento;
        $atendimento->tecnico_id = $tecnico->id;
        $atendimento->save();
        $tecnico->update($request->all('location_id'));
        return redirect('homeNews');
    }

    public function encerraAtendimento($idAtendimento){
        $tecnico = Tecnico::findOrFail(Auth::user()->tecnico->id);
        $tecnico->status = 0;
        $atendimento = Atendimento::findOrFail($idAtendimento);
        $atendimento->fimAtendimento = date('H:i:s', strtotime(now()));
        $atendimento->tempoDeAtendimento = $this->calculaTempoAtendimento($atendimento->inicioAtendimento,$atendimento->fimAtendimento);
        $atendimento->save();
        $tecnico->save();
        return redirect('homeNews');
    }
    public function calculaTempoAtendimento($inicioAtendimento, $fimAtendimento){
        $entrada = $inicioAtendimento;
        $saida = $fimAtendimento;
        $hora1 = explode(":",$entrada);
        $hora2 = explode(":",$saida);
        $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
        $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
        $resultado = $acumulador2 - $acumulador1;
        $hora_ponto = floor($resultado / 3600);
        $resultado = $resultado - ($hora_ponto * 3600);
        $min_ponto = floor($resultado / 60);
        $resultado = $resultado - ($min_ponto * 60);
        $secs_ponto = $resultado;
        $tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
        return $tempo;
    }

    public function AddPlayTime($times) {
//        return $times;
        $sumTime = 0;
        foreach ($times as $time){
            if(!($time->tempoDeAtendimento == NULL)){
                list($hour, $minute, $second) = explode(':', $time->tempoDeAtendimento);
                $sumTime += $second;
                $sumTime += $minute * 60;
                $sumTime += $hour * 60;
            }

        }
        return $this->secToHR($sumTime);

    }
    public function secToHR($seconds){

        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        return "$hours:$minutes:$seconds";
    }
}
