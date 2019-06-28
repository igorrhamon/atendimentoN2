<?php

namespace App\Http\Controllers\Auth;

//use App\Atendimento;
use App\Atendimento;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\Controller;
use App\Tecnico;
use App\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/homeNews';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


//    Verifica se houve algum atendimento que ficou aberto.
    protected function authenticated( $request, $user)
    {
        $tecnico = Auth::user()->tecnico;

        $atendimentosAbertos = Atendimento::all()
            ->where('fimAtendimento','=',NULL)
            ->where('created_at','>=',date('Y-m-d',strtotime("-3 days")))
            ->where('created_at','<',date('Y-m-d',strtotime(now())))
            ->where('tecnico_id','=', Auth::id());
        foreach ($atendimentosAbertos as $atendimento){
            $atendimento->fimAtendimento = $atendimento->inicioAtendimento;
            $atendimento->tempoDeAtendimento="00:00:00";
            $atendimento->save();
        };
        $atendimentoController = new AtendimentoController();
        $atendimentoController->atualizaTempoAtendimento($tecnico);
        $tecnico->save();
//        $atendimentosAbertos->save();
    }
}
