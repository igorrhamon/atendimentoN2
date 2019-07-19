<?php

namespace App\Http\Controllers;

use App\Events\encerrarAtendimento;
use App\Events\inicioAtendimento;
use App\Events\pusherEvent;
use App\HardDrive;
use App\Http\Requests\IniciarAtendimentoRequest;
use Carbon\Carbon;
use function foo\func;
use Notification;
use App\Atendimento;
use App\Location;
use App\Notifications\TecnicoAvaliable;
use App\Supervisor;
use App\Tecnico;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtendimentoController extends Controller
{

    public function iniciarAtendimentoForm($id){
        $user = User::findOrFail($id);
        $locations = Location::all()->where('name','!=','Central');
        $tecnico = $user->tecnico;
        $hardDrives = HardDrive::all()->where('avaliable', '=',TRUE);
        return view('tecnicos.iniciarAtendimento',compact('locations','tecnico','hardDrives'));
    }
    public function iniciarAtendimento(IniciarAtendimentoRequest $request){
        $tecnico = Auth::user()->tecnico;
        $tecnico->status = 1;

        $tecnico->lastLocation_id = $request->location_id;


        $dataDoAtendimento = date('Y-m-d', strtotime(now()));
        $inicioAtendimento = date('H:i:s', strtotime(now()));
        $atendimento = new Atendimento();
//        $tecnico = $this->atualizaTempoAtendimento($tecnico);

        $atendimento->inicioAtendimento = $inicioAtendimento;
        $atendimento->dataDoAtendimento = $dataDoAtendimento;
        $atendimento->tecnico_id = $tecnico->id;
        $atendimento->location_id = $request->location_id;
        $atendimento->numeroChamado = $request->numeroChamado;



        if($request->hardDrive_id != NULL){
            $hardDrive = HardDrive::findOrFail($request->hardDrive_id);
            $hardDrive->avaliable = FALSE;
            $hardDrive->user_id = $tecnico->user->id;
            $hardDrive->save();
            $atendimento->hardDrive_id = $request->hardDrive_id;
        }
//        return $request;
        $tecnico->update();
        $atendimento->save();
        $atendimento->locations()->sync(intval($request->location_id));
        broadcast(new inicioAtendimento($atendimento));


        return redirect('homeNews');
    }

    public function encerraAtendimento($idAtendimento){
        $tecnico = Auth::user()->tecnico;
        $tecnico->status = 0;

        $centralLocation = Location::all()->where('name','=','Central')->first();
        $tecnico->lastLocation_id = $centralLocation->id;

        $atendimento = Atendimento::findOrFail($idAtendimento);
        if($atendimento->hardDrive != NULL){
            $hardDrive = $atendimento->hardDrive;
            $hardDrive->avaliable = TRUE;
            $hardDrive->save();
        }
        $atendimento->fimAtendimento = date('H:i:s', strtotime(now()));
//        return $this->calculaTempoAtendimento($atendimento->inicioAtendimento,$atendimento->fimAtendimento);
        $atendimento->tempoDeAtendimento = $this->calculaTempoAtendimento($atendimento->inicioAtendimento,$atendimento->fimAtendimento);
        $atendimento->dataDoAtendimento = date("Y-m-d",strtotime(now()));


        $atendimento->save();
        $tecnico->save();

        broadcast(new encerrarAtendimento($atendimento));

        return redirect('homeNews');
    }
    public function calculaTempoAtendimento($inicioAtendimento, $fimAtendimento){

        $inicio = Carbon::parse($inicioAtendimento,config('app.timezone'));
//        return $inicio;
        $fim = Carbon::parse($fimAtendimento,config('app.timezone'));

        $tempoTotal = $fim->diffInSeconds($inicio->format('H:i:s'));

//        $entrada = $inicioAtendimento;
//        $saida = $fimAtendimento;
//        $hora1 = explode(":",$entrada);
//        $hora2 = explode(":",$saida);
//
//        $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
//        $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
//        $resultado = $acumulador2 - $acumulador1;
//
//        $hora_ponto = floor($resultado / 3600);
//        $resultado = $resultado - ($hora_ponto * 3600);
//
//        $min_ponto = floor($resultado / 60);
//        $resultado = $resultado - ($min_ponto * 60);
//
//        $secs_ponto = $resultado;
//        $tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
        return gmdate('H:i:s', $tempoTotal);;
    }
//        AddPlayTime antiga
//    public function AddPlayTime($atendimentos) {
////        return $times;
//        $acumulador1 = 0;
//        foreach ($atendimentos as $atendimento){
//            if(!($atendimento->tempoDeAtendimento == NULL || $atendimento->dataDoAtendimento == date('H:i:s', strtotime(now())))){
//                list($hour, $minute, $second) = explode(':', $atendimento->tempoDeAtendimento);
//                $acumulador1 += ($hour * 3600) + ($minute* 60) + $second;
//            }
//        }
//        $hora_ponto = floor($acumulador1 / 3600);
//        $acumulador1 = $acumulador1 - ($hora_ponto *3600);
//        $minuto_ponto = floor($acumulador1 /60);
//        $acumulador1 = $acumulador1 - ($minuto_ponto *60);
//        $segundos_ponto = $acumulador1;
//        $resultado = $hora_ponto.":".$minuto_ponto.":".$segundos_ponto;
//        return $resultado;
//    }
    public function AddPlayTime($atendimentos) {
//        return $times;


    }

    public function atualizaTempoAtendimento($tecnico){


        $dataAtual = date("Y-m-d",strtotime(now()));
        $atendimentos = $tecnico->atendimentosHoje;
        return $atendimentos;
//
//        if ($atendimentos->isNotEmpty()){
//            $ultimoAtendimento = $atendimentos->last();
//            if($ultimoAtendimento->dataDoAtendimento == $dataAtual){
//                $tecnico->tempoDeAtendimento = $this->AddPlayTime($atendimentos);
//            }}else{
//            $tecnico->tempoDeAtendimento = "00:00:00";
//        }
//        return $tecnico;
    }

    public function atualizaTempoAtendimentoIndex($tecnico){
        $acumulador = 0;

        $atendimentosHoje = $tecnico->atendimentosHoje->where('fimAtendimento','!=',NULL);
        $atendimentosHoje->transform(function ($item, $key) {

            $item->inicioAtendimentoCarbon = Carbon::parse($item->inicioAtendimento,config('app.timezone'));
            $item->fimAtendimentoCarbon = Carbon::parse($item->fimAtendimento,config('app.timezone'));

            $item->tempoEmSegundos = ($item->fimAtendimentoCarbon->diffInSeconds($item->inicioAtendimentoCarbon));

            return $item;
        });

        $tecnico->tempoDeAtendimento = gmdate('H:i:s',$atendimentosHoje->sum('tempoEmSegundos'));


        $tecnico->save();

    }

    public function totalAtendimentoHoje(){
        $tempoTotal = "00:00:00";
        $atendimentos = Atendimento::all()->where('dataDoAtendimento','=',date("Y-m-d",strtotime(now())))->where('fimAtendimento','!=',NULL);
        $tempoTotal= $this->AddPlayTime($atendimentos);
        return $tempoTotal;
    }

    public function tempoEmSegundos($tempoDeAtendimento){
            $acumulador = 0;
            Carbon::setLocale(config('app.timezone'));

            $tempoEmSegundos = Carbon::parse($tempoDeAtendimento);
//            list($hour, $minute, $second) = explode(':', $tempoDeAtendimento);
//            $acumulador +=  (intval($hour )* 3600);
//                $acumulador +=  (intval($minute)* 60);
//        $acumulador +=   intval($second);
        return $tempoEmSegundos->secondsSinceMidnight();
    }
    public function tempoEmPorcentagem($tempoDeAtendimento,$tempoTotal){
        $tempoEmSegundo = $this->tempoEmSegundos($tempoDeAtendimento);
        $tempoTotalEmSegundo = $this->tempoEmSegundos($tempoTotal);
            if($tempoTotalEmSegundo!=0)
                return $tempoEmSegundo / $tempoTotalEmSegundo *100;
           else return 0;
   }

    public function tempoPorTecnicoPorcentagem(){
        $tempoTotalSeg = $this->totalAtendimentoHoje();
        $dataAtual = date('Y-m-d',strtotime(now()));
        /*
         * Retorna os técnicos que tem atendimento hoje.
         */
//        return $tecnicos;
        $atendimentos = Atendimento::all()->where('dataDoAtendimento','==',$dataAtual)->where('fimAtendimento','!=',NULL);
        /*
         * Técnicos que tem atendimentos hoje
         */
         $tecnicos = Tecnico::whereHas('atendimentos', function ($query){
            $query->where('dataDoAtendimento','=',date('Y-m-d',strtotime(now())))->where('fimAtendimento','!=',NULL);
        })->get();
//        return $tecnicos;
        $tecnicos->transform(function ($tecnico){
            $tecnico->tempoDeAtendimento = $this->tempoEmPorcentagem($tecnico->tempoDeAtendimento,$this->totalAtendimentoHoje());
            return $tecnico;
        });
        $atendimentos->transform(function ($atendimento){
            /*
             * Se o
             */
            if($atendimento->fimAtendimento != NULL || $atendimento->tecnico->tempoDeAtendimento != "00:00:00")
                $atendimento->tecnico->tempoDeAtendimento = $this->tempoEmPorcentagem($atendimento->tecnico->tempoDeAtendimento,$this->totalAtendimentoHoje());
            return $atendimento;
        });
//
        return $tecnicos;
    }
    public function tempoPorTecnicoPorcentagemVersao(){
        $tecnicos = Tecnico::whereHas('atendimentos', function ($query){
            $query->where('dataDoAtendimento','=',date('Y-m-d',strtotime(now())));
        })->get();
        $tecnicos->transform(function ($item){
            $tempoTotalSeg = $this->totalAtendimentoHoje();
            if($tempoTotalSeg !=0 ){
                $calculaTecnico = New Tecnico();
                $calculaTecnico->setAttribute('user_id',$item['user_id']);
                $calculaTecnico->tempoDeAtendimento = $this->tempoEmPorcentagem($item);
            }
        });
    }

    public function atualizaTempoAtendimentoTecnicos($tecnicos){
        foreach ($tecnicos as $tecnico){
            $tecnico = $this->atualizaTempoAtendimento($tecnico);
        }
        return $tecnicos;
    }
}
