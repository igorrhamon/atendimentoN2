<?php

namespace App\Http\Controllers;

use App\Location;
use App\News;
use App\Tecnico;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TecnicoController extends Controller
{
    public function all(){
        $tecnico = Tecnico::all();
        return view('home',compact('tecnico'));
    }

    /*
     * --------------------------- Crud Tecnico
     */

    public function storeNewTecnicoForm(){
        $users = User::all();
        return view('tecnicos.layout.TecnicoForm',compact('users'));
    }

    /*
     * @todo: Verificar a necessidade de criar um usuário juntamente com o técnico
     */

    public function storeNewTecnico(Request $newTecnico){
//        return $newTecnico;
        $user = User::create($newTecnico->except('status','location_id','user_id'));
//        return $user;

        $newTecnico->request->add(['user_id'=>$user->id]);
        $tecnico = Tecnico::create($newTecnico->except('lunchTime','officeTime'));
        $this->viewTecnico($tecnico->id);

    }

    public function editTecnicoForm($id){
//        return $id;
        $tecnico = Tecnico::findOrFail($id);
        $users = User::all();
            return view('stubs.formulario.editTecnicoForm',compact('tecnico','users'));
//        try{
//            $tecnico = Tecnico::findOrFail($id);
//            return view('stubs.formulario.editTecnicoForm',compact('$tecnico'));
//        }catch(\Exception $e){
//            echo "Não Encontrado";
//        }
    }

//    public function editTecnico(Request $request){
//        try{
//            $tecnicoEdit = Tecnico::findOrFail($request->id);
//            try{
//                $user = User::findOrFail($request->user_id);
//            }catch (\Exception $e){
//                echo "Não foi encontrado o usuário";
//            }
//            try{
//                $tecnicoEdit->update($request->all());
//                $user->update($request->all());
//                try{
//
//                }catch (\Exception $e){
//                    echo "User não foi editado";
//                }
//            }catch (\Exception $e){
//                echo "Não foi editado";
//            }
//
//        }catch (\Exception $e){
//            echo "Não encontrou o tecnico";
//        }
//    }
    public function editTecnico(Request $request){
        $tecnico = DB::select('SELECT * from tecnicos join users on tecnicos.user_id = users.id where tecnicos.id = '.$request->id);
        $tecnico = DB::update('UPDATE tecnicos SET tecnicos.name from tecnicos join on users.id = tecnicos.user_id');
    }

    /*
     * @todo: Verificar segurança do Update
     */
    public function changeStatusForm(){
        $tecnicos = Tecnico::all();
        return view('stubs.formulario.changeStatusForm',compact('tecnicos'));
    }

    public function changeStatus(Request $request){
        $tecnico = Tecnico::findOrFail($request->id);
        try{
            $tecnico->update($request->all());
            return redirect('changeStatus');
        }catch (\Exception $e){
            /*
             * @todo: Tratar Exceção
             */
            return redirect('changeStatus');
        }

    }

    /*
     * Muda a localização do Técnico
     */

    public function changeLocationForm($id){
        $locations = Location::all();
        $tecnico = Tecnico::findOrFail($id);
//        return $tecnicos;
        return view('stubs.formulario.changeLocationForm',compact('locations','tecnico'));
    }
    public function changeLocation(Request $request){
        $tecnico = Tecnico::findOrFail($request->id);
        $tecnico->update($request->all());
    }




    /**
     * @return Tecnico[]|\Illuminate\Database\Eloquent\Collection Retorna o número de técnicos prontos para atendimento
     */
    public function tecnicoAvaliable(){
        $tecnicos = Tecnico::all()->where('status','==','0');
        return view('listTecnicos', compact('tecnicos'));
    }

    public function showWhoIsAvaliable(){
        $tecnicos = Tecnico::all()->where('status','=','0');
        return $tecnicos;
    }

    /*
     * @todo: Criar uma VIEW para ver o tecnico
     */
    public function viewTecnico($id){
        $tecnico = Tecnico::findOrFail($id);
        echo "Novo tecnico criado";
    }


    /*
     * @todo: Verificar o NoRead
     */

    public function noRead($id){
        $tecnico = Tecnico::findOrFail($id);

    }


}
