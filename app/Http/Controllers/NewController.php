<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    public  function openNewTecnico($id){
        $new = News::findOrFail($id);
        DB::table('news_tecnico')->insert(['news_id'=>$new->id,'tecnico_id'=>Auth::user()->tecnico->id]);
//        $noRead = new NewController();
        $naoLidas = $this->noRead(Auth::id());
        return view('news.openNew',compact('new','naoLidas'));
    }

    public function createNewForm(){
        return view('stubs.formulario.createNew');
    }

    public function createNew(Request $request){
        $new = News::create($request->all());
        return $new;
    }

    public function editNewForm($id){
        $new = News::findOrFail($id);
        return view('stubs.formulario.editNewForm',compact('new'));
    }
    public function editNew(Request $request){
        $new = News::findOrFail($request->id);
        $new->update($request->all());
    }

    public function deleteNewForm(){
        $news = News::all();
        return view('stubs.formulario.deleteNewForm',compact('news'));
    }
    public function deleteNew(Request $request){
        $new = News::findOrFail($request->id);
//        return $new;
        $new->delete();
        echo "Deletado";
    }

    public function showAllNews(){
        $news = News::all();

        return view('news.home',compact('news'));
    }

    public function noRead($id){
        $news = News::whereDoesntHave('whoRead' ,function($query){
            $query->where('tecnico_id',Auth::user()->tecnico->id);
        })->get();
        return $news;
    }

    public function noReadPaginate($id){
        $news = News::whereDoesntHave('whoRead' ,function($query){
            $query->where('tecnico_id',Auth::id());
        })->paginate(6);
        return $news;
    }

//    public function whoRead($id){
//        $tecnicos = News::findOrFail($id);
//        return $tecnicos->whoRead();
//    }


}
