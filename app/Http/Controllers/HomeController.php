<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\News;
//use App\Supervisor;
use App\Tecnico;
use App\User;
use Illuminate\Http\Request;
use App\Location;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::paginate(6);
        $id = Auth::id();
        $noRead = new NewController();
        $naoLidas = $noRead->noRead($id);
        $user = User::findOrFail($id);
        if($user->tecnico->status == 1) $atendimento = $user->tecnico->atendimentos->last();


        $atendimentoController = new AtendimentoController();
        $tecnico = $atendimentoController->atualizaTempoAtendimentoIndex($user->tecnico);
        $AnyChartJson = $atendimentoController->tempoPorTecnicoPorcentagem();
        $tecnico->save();
        $tempoAtendimentoHoje = $user ->tecnico->tempoDeAtendimento;
        $location = Location::findOrFail($user->tecnico->location_id);

        return view('news.home',compact('news','id','naoLidas', 'user','location', 'atendimento','tempoAtendimentoHoje','AnyChartJson'));
    }

    public function index2(){
        //Notícias para página inicial
        $news = News::paginate(6);

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

        /*
         * Json para gerar os gráficos
         */
        $AnyChartJson = $atendimentoController->tempoPorTecnicoPorcentagem();
        return $AnyChartJson;




    }

    public function indexNaoLido(){
        $id = Auth::id();
        $noRead = new NewController();
        $naoLidas = $noRead->noReadPaginate($id);

        $user = User::findOrFail($id);
        $location = Location::findOrFail($user->tecnico->location_id);
        $news = $naoLidas;
        return view('news.home',compact('news','id','naoLidas', 'user','location'));
    }

    public function supervisorAdmin(){

//        $locations = Location::has('tecnicos',function ($query){
//            return $query->where('status','=','1');
//        })->get();

        $locations = Location::whereHas('tecnicos', function ($query){
            $query->where('status','=','1');
        })->get();

        $tecnicos = Tecnico::all();
        $atendimentos = new AtendimentoController();
        $atendimentosEmAberto = Atendimento::all()->where('fimAtendimento','=','NULL');
        $tempoTotal = $atendimentos->totalAtendimentoHoje();
        $AnyChartJson = $atendimentos->tempoPorTecnicoPorcentagem();
        return $AnyChartJson;
//        $charJson =
        return view('supervisor.supervisorAdmin',compact('locations','atendimentos','atendimentosEmAberto','tecnicos','tempoTotal','AnyChartJson'));
    }
}
