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
        $dataDoAtendimento = date('Y-m-d', strtotime(now()));
        $inicioAtendimento = date('H:i:s', strtotime(now()));
        $atendimento = new Atendimento();
//        $tecnico = $this->atualizaTempoAtendimento($tecnico);
        $tecnico->location_id = $request->location_id;
        $tecnico->save();
        $atendimento->inicioAtendimento = $inicioAtendimento;
        $atendimento->dataDoAtendimento = $dataDoAtendimento;
        $atendimento->tecnico_id = $tecnico->id;
        $atendimento->numeroChamado =$request->numeroChamado;
        $atendimento->save();
        return redirect('homeNews');
    }

    public function encerraAtendimento($idAtendimento){
        $tecnico = Auth::user()->tecnico;
        $tecnico->status = 0;
        $atendimento = Atendimento::findOrFail($idAtendimento);
        $atendimento->fimAtendimento = date('H:i:s', strtotime(now()));
        $atendimento->tempoDeAtendimento = $this->calculaTempoAtendimento($atendimento->inicioAtendimento,$atendimento->fimAtendimento);
        $atendimento->dataDoAtendimento = date("Y-m-d",strtotime(now()));
        $atendimento->save();
        $tecnico = $this->atualizaTempoAtendimento($tecnico);
        $tecnico->location_id = 1;
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

    public function AddPlayTime($atendimentos) {
//        return $times;
        $acumulador1 = 0;
        foreach ($atendimentos as $atendimento){
            if(!($atendimento->tempoDeAtendimento == NULL || $atendimento->dataDoAtendimento == date('H:i:s', strtotime(now())))){
                list($hour, $minute, $second) = explode(':', $atendimento->tempoDeAtendimento);
                $acumulador1 += ($hour * 3600) + ($minute* 60) + $second;
            }
        }
        $hora_ponto = floor($acumulador1 / 3600);
        $acumulador1 = $acumulador1 - ($hora_ponto *3600);
        $minuto_ponto = floor($acumulador1 /60);
        $acumulador1 = $acumulador1 - ($minuto_ponto *60);
        $segundos_ponto = $acumulador1;
        $resultado = $hora_ponto.":".$minuto_ponto.":".$segundos_ponto;
        return $resultado;
    }

    public function atualizaTempoAtendimento($tecnico){
        $dataAtual = date("Y-m-d",strtotime(now()));
//        $atendimentos = Atendimento::all()->where('tecnico_id','=',$tecnico->id)->where('dataDoAtendimento','=',$dataAtual);
        $atendimentos = $tecnico->atendimentosHoje;

        if ($atendimentos->isNotEmpty()){
            $ultimoAtendimento = $atendimentos->last();
            if($ultimoAtendimento->dataDoAtendimento == $dataAtual){
                $tecnico->tempoDeAtendimento = $this->AddPlayTime($atendimentos);
        }}else{
            $tecnico->tempoDeAtendimento = "00:00:00";
        }
        return $tecnico;
    }

    public function atualizaTempoAtendimentoIndex($tecnico){
        $dataAtual = date('Y-m-d',strtotime(now()));
        $atendimentos = $tecnico->atendimentosHoje;
        if($atendimentos->count()==0) $tecnico->tempoDeAtendimento = "00:00:00";
        return $tecnico;
    }
}
