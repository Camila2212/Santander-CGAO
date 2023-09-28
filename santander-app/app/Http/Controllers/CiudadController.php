<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CiudadController extends Controller
{
    //
    
    public function index(){
        $datos=DB::select('select * from ciudades');
        return view('ciudad')->with('datos',$datos);
    }
    public function create(Request $request){
        try
        {
            $sql=DB::insert("insert into ciudades(idCiudad,nombre)values(NULL,?) ",[
                $request->nombre,
            ]);
        }
        catch (\Throwable )
        {
            $sql=0;
        }
        if ($sql==true) {
            return back()->with("correcto","La ciudad ha sido registrada correctamente");
        } else {
            return back()->with("incorrecto","Error la ciudad no ha sido registrada");
        }
        
    }
    public function update(Request $request){
        try
        {
            $sql=DB::update('update ciudades set nombre=? where idCiudad=?',[
                $request->nombre,
                $request->id
            ]);
            if($sql==0){
                $sql=1;
            }

        }
        catch (\Throwable $e )
        {
            $sql=0;
        }
        // if ($sql>0) {
        //     return back()->with('correcto','La ciudad ha sido modificado');
        // } else {
        //     return back()->with('incorrecto','Error la ciudad no ha sido modificado');
        // }
        return $request;
        
    }
    public function delete($id){
    try
    {
        $sql=DB::delete("delete from ciudades where idCiudad=$id");
    }
    catch (\Throwable )
    {
        $sql=0;
    }
    if ($sql==true) {
        return back()->with("correcto","La ciudad ha sido eliminada correctamente");
    } else {
        return back()->with("incorrecto","Error la ciudad no ha sido eliminada");
    }
    
    }
}

