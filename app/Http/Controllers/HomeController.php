<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\News;
use App\Tecnico;
use App\User;
use Carbon\Carbon;
use Mapper;
use DateTime;
use Illuminate\Http\Request;
use App\Location;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //Notícias para página inicial
        $news = News::orderBy('id','DESC')->paginate(6);

        //Transforma o created_at
        Carbon::setLocale('pt-br');
        $news->transform(function ($item,$key){
           $item['created_at'] = Carbon::createFromFormat('Y-m-d H:m:s', $item['created_at']);
           return $item;
        });
//        return $news;

        $user = Auth::user();

        //Contagem de notícias não lidas
        $noRead = new NewController();
        $naoLidas = $noRead->noRead($user->id);


        /*
         * Verifica o ultimo atendimento do usuário
         * Caso não haja atendimento hoje, o tempo de Atendimento é zerado.
         */
        $atendimentoController = new AtendimentoController();
        $atendimentoController->atualizaTempoAtendimentoIndex($user->tecnico);

        if($user->tecnico->status == 1){
//            $atendimento = $user->tecnico->atendimentosHoje->where('fimAtendimento',NULL);
            $atendimento = $user->tecnico->atendimentosHoje->where('fimAtendimento',NULL)->first();
            $location = $atendimento->locations->first();
        }else{
            $location = new Location();
            $location->name= 'Central';
        }
        /*
         * Json para gerar os gráficos
         */
        $AnyChartJson = $atendimentoController->tempoPorTecnicoPorcentagem();
//        return $AnyChartJson;

        /*
         * @todo: O relacionamento entre location_id e tecnico não está funcionando corretamente
         */
        $tempoAtendimentoHoje = $user->tecnico->tempoDeAtendimento;


        return view('news.home',compact('news', 'naoLidas','AnyChartJson','tempoAtendimentoHoje','location','atendimento'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function indexNaoLido(){
        $id = Auth::id();
        $noRead = new NewController();
        $naoLidas = $noRead->noReadPaginate($id);

        $user = User::findOrFail($id);
        $location = Location::findOrFail($user->tecnico->location_id);
        $news = $naoLidas;


        /*
         * Verifica o ultimo atendimento do usuário
         * Caso não haja atendimento hoje, o tempo de Atendimento é zerado.
         */
        $atendimentoController = new AtendimentoController();
        $atendimentoController->atualizaTempoAtendimentoIndex($user->tecnico);

        if($user->tecnico->status == 1) $atendimento = $user->tecnico->atendimentosHoje->last();

        /*
         * Json para gerar os gráficos
         */
        $AnyChartJson = $atendimentoController->tempoPorTecnicoPorcentagem();

        $location = Location::findOrFail($user->tecnico->location_id);
        $tempoAtendimentoHoje = $user->tecnico->tempoDeAtendimento;



        return view('news.home',compact('news','id','naoLidas', 'user','location','AnyChartJson','tempoAtendimentoHoje','atendimento','location'));
    }


//    public function supervisorAdmin(){
//
//
//        $locations = Location::whereHas('tecnicos', function ($query){
//            $query->where('status','=','1');
//        })->get();
//        $tecnicos = Tecnico::all();
//        $atendimentos = new AtendimentoController();
//        $atendimentosEmAberto = Atendimento::all()->where('fimAtendimento','=','NULL');
//        $tempoTotal = $atendimentos->totalAtendimentoHoje();
//        $AnyChartJson = $atendimentos->tempoPorTecnicoPorcentagem();
//        return view('supervisor.supervisorAdmin',compact('locations','atendimentos','atendimentosEmAberto','tecnicos','tempoTotal','AnyChartJson'));
//    }
    public function supervisorAdmin(){


        $locations = Location::whereHas('atendimentos', function ($query){
            $query->where('fimAtendimento','=',NULL);
        })->get();
        $tecnicos = Tecnico::all();
        $atendimentos = new AtendimentoController();
        $atendimentosEmAberto = Atendimento::all()->where('fimAtendimento','=','NULL');
        $tempoTotal = $atendimentos->totalAtendimentoHoje();
        $AnyChartJson = $atendimentos->tempoPorTecnicoPorcentagem();
        return view('supervisor.supervisorAdmin',compact('locations','atendimentos','atendimentosEmAberto','tecnicos','tempoTotal','AnyChartJson'));
    }

    public function exibirMapa(){
        $locations = Location::whereHas('atendimentos', function ($query){
            $query->where('fimAtendimento','=',NULL);
        })->get();
//        Mapper::map(-15.7973535, -47.86451608);
//        Mapper::informationWindow(-15.79620758, -47.86445707, 'Igor', ['markers' => ['animation' => 'DROP']]);

        $centralLocation = Location::all()->where('name','=','Central')->first();
        Mapper::map($centralLocation->latitude,$centralLocation->longitude,[
            'language'=>'pt-br',
            'zoom'=>'17',
            'cluster' => false
        ]);



        Mapper::informationWindow($centralLocation->latitude,$centralLocation->longitude, 'Central', ['open' => true, 'maxWidth'=> 300, 'markers' => ['title' => 'Title']]);
        foreach ($locations as $location){
            Mapper::informationWindow($location->latitude,$location->longitude,"<a href='".route('whoIsOnLocation',$location->id)."'>".$location->name."</a>", ['open' => true, 'maxWidth'=> 300, 'markers' => ['title' => 'Title']]);
            Mapper::marker($location->latitude,$location->longitude ,['markers' =>
                ['symbol' => 'circle',
                    'scale' => 10,
                    'animation' => 'DROP',
                    'title'=>$location->name,
                    'eventClick' => 'console.log("left click")'
                ]]);
        }
        return view('mapa.mapa',compact('locations'));
    }


    public function showWhoIsAvaliable(){
        $tecnicos = Tecnico::all()->where('status','=','0');

//      Transforma a collection para mostrar quem está próximo do horário do almoço
        $tecnicos->transform(function ($item,$key){

//            Prepara o Carbon
            $timeZone = config('app.timezone');
            Carbon::setLocale(config('app.locale'));

//            Horário Atual
            $horarioAtual =Carbon::now($timeZone);

//            Horário do Técnico
            $horarioDeAlmoço = Carbon::createFromTimeString($item->user->lunchTime,$timeZone);

//            Retorna o tempo que o técnico tem
            $diferença = $horarioAtual->diffAsCarbonInterval($horarioDeAlmoço);

//          Se o almoço for em menos de uma hora $item->almoçoProximo será true
            if($diferença->totalHours <= 1) $item->almoçoProximo = true;
            else $item->almoçoProximo = false;
//            Se tiver atendimentos feitos hoje, então calcula se foi a uma hora
            if($item->atendimentos->where('dataDoAtendimento','=',date("Y-m-d",strtotime(now())))->count()>0) {
                $ultimoAtendimento = $item->atendimentos->where('dataDoAtendimento', '=', date("Y-m-d",strtotime(now())))->last();
                $tempoSemAtender = Carbon::createFromTimeString( $ultimoAtendimento->fimAtendimento,$timeZone)->diffForHumans($horarioAtual);
                $item->tempoSemAtender = $tempoSemAtender;
            }else $item->tempoSemAtender = "Não atendeu hoje";

//            Retorna o item para a collection
            return $item;

        });
        return view('tecnicos.isAvaliable', compact('tecnicos'));
    }
}
