<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiudadController extends Controller
{
     
    public function index(){
        $datos=DB::select('select * from ciudades');
        return view('ciudad')->with('datos',$datos);

    }
    public function create(Request $request){
        try
        {
            $sql=DB::insert('insert into ciudades(`idCiudad`, `nombreCiudad`)
            values(Null,?,?)');
        }
        catch (\Throwable $e)
        {
            
        }
    }
}
