<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\News;
//use App\Supervisor;
use App\Tecnico;
use App\User;
use Carbon\Carbon;
use DateTime;
use function foo\func;
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

        if($user->tecnico->status == 1) $atendimento = $user->tecnico->atendimentosHoje->last();

        /*
         * Json para gerar os gráficos
         */
        $AnyChartJson = $atendimentoController->tempoPorTecnicoPorcentagem();
//        return $AnyChartJson;

        /*
         * @todo: O relacionamento entre location_id e tecnico não está funcionando corretamente
         */
        $location = Location::findOrFail($user->tecnico->location_id);
        $tempoAtendimentoHoje = $user->tecnico->tempoDeAtendimento;

        /*
         * Select de artigos não lidos
         */
        $noRead = new NewController();
        $naoLidas = $noRead->noRead($user->id);

//        return $atendimento;

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
        return view('news.home',compact('news','id','naoLidas', 'user','location'));
    }

    public function supervisorAdmin(){


        $locations = Location::whereHas('tecnicos', function ($query){
            $query->where('status','=','1');
        })->get();
        $tecnicos = Tecnico::all();
        $atendimentos = new AtendimentoController();
        $atendimentosEmAberto = Atendimento::all()->where('fimAtendimento','=','NULL');
        $tempoTotal = $atendimentos->totalAtendimentoHoje();
        $AnyChartJson = $atendimentos->tempoPorTecnicoPorcentagem();
        return view('supervisor.supervisorAdmin',compact('locations','atendimentos','atendimentosEmAberto','tecnicos','tempoTotal','AnyChartJson'));
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
