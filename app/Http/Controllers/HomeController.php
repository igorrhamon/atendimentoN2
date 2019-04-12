<?php

namespace App\Http\Controllers;

use App\News;
use App\Supervisor;
use App\Tecnico;
use App\User;
use Illuminate\Http\Request;
use App\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
//        return $news->supervisor->user->name;
//        return $news->supervisor->user->name;
        $id = Auth::id();
        return view('news.home',compact('news','id'));
    }

    public function supervisorAdmin(){

        //@todo: Verificar um modo de trazer os técnicos por localização.
//        $tecnicos = Tecnico::has('location')->get();
//        foreach ($tecnicos as $tecnico)echo  $tecnico->name.'<br>';
//        $location = Location::all();
        $locations = Location::has('tecnicos')->get();
//        'SELECT * FROM locations RIGHT JOIN tecnicos   ON tecnicos.location_id = locations.id');
//        return var_dump($locations);
//        foreach ($locations as $location) echo $location->name."<BR>";

        return view('supervisor.supervisorAdmin',compact('locations'));

    }
}
