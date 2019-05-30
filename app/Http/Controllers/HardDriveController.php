<?php

namespace App\Http\Controllers;

use App\HardDrive;
use Illuminate\Http\Request;

class HardDriveController extends Controller
{
    public function listarHD(){
        $HDs = HardDrive::all();
        return view('HD.listarHD',compact('HDs'));
    }
}
