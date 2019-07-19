<?php

namespace App\Http\Controllers;

use App\HardDrive;
use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function createLocationForm(){
        return view('stubs.formulario.createLocationForm');
    }
    public function createLocation(Request $request){
        $location = Location::create($request->all());
        return 'Criado';
    }

    public function editLocationForm($id){
        $location = Location::findOrFail($id);
        return view('stubs.formulario.editLoctaionForm',compact('location'));
    }

    public function editLocation(Request $request){

        $location = Location::findOrFail($request->id);
        $location->update($request->all());
        return 'Editado';
    }

    public function deleteLocationForm(){
        $locations = Location::all();
        return view('stubs.formulario.deleteLocationForm',compact('locations'));
    }
    public function deleteLocation(Request $request){
        $location = Location::findOrFail($request->id);
//        return $location;
        $location->delete();
        echo "Deletado";
    }

    public function whoIsOnLocation($id){
        $location = Location::whereHas('atendimentos', function ($query){
            $query->where('fimAtendimento','=',NULL);
        })->get()->where('id','=',$id)->first();
//        $location = Location::whereHas('atendimentos', function ($query){
//            $query->where('fimAtendimento','=',NULL);
//        })->where('id','=',$id)->first();

//        $location->atendimentos->transform(function ($item, $key) {
//            if($item->fimAtendimento == NULL) return $item;
//        });
        $atendimentos = $location->atendimentos->where('fimAtendimento',NULL);
        $atendimentos->transform(function ($item,$key){
           if(empty($item->hardDrive)){
               $hardDriveVazio = new HardDrive();
               $hardDriveVazio->endLog = "Sem HD";
               $item->hardDrive = $hardDriveVazio;
           }
           return $item;
        });
//        return $location->atendimentos->where('fimAtendimento','=',NULL);
//        return var_dump($atendimentos->first());
//        return $atendimentos->first();
        return view('location.locationTecnico',compact('atendimentos'));
    }
}
