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
        return view('news.criarNew');
    }

    public function createNew(Request $request){
        $new = News::create($request->all());
        return redirect('new/'.$new->id);
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
    public function deleteNew($id){
        $new = News::findOrFail($id);
//        return $new;
        $new->delete();
        return redirect(route('manageNews'));
    }

    public function showAllNews(){
        $news = News::all()->sortByDesc;

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

    public function manageNews(){
        $news = News::paginate(10);
        return view('news.gerenciarNews',compact('news'));

    }

//    public function whoRead($id){
//        $tecnicos = News::findOrFail($id);
//        return $tecnicos->whoRead();
//    }


}
