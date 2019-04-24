<?php

namespace App\Http\Controllers;

use App\Location;
use App\Tecnico;
use App\User;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function iniciarAtendimento($id){
        $user = User::findOrFail($id);
        $locations = Location::all();
        $tecnico = $user->tecnico;
        return view('tecnicos.iniciarAtendimento',compact('locations','tecnico'));
    }
    public function changeLocation(Request $request){
        $tecnico = Tecnico::findOrFail($request->id);
//        return $tecnico;
//        return $request;
        $tecnico->update($request->all('location_id'));
        return redirect('homeNews');
    }
}
