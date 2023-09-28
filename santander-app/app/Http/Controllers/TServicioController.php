<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TServicioController extends Controller
{
    
    //
    
    public function index(){
        $datos=DB::select('select * from tipoServicios');
        return view('tiposervicio')->with('datos',$datos);
    }
    public function create(Request $request){
        try
        {
            $sql=DB::insert("insert into tipoServicios(idTipoServicio,nombre)values(NULL,?) ",[
                $request->nombre,
            ]);
        }
        catch (\Throwable )
        {
            $sql=0;
        }
        if ($sql==true) {
            return back()->with("correcto","El tipo servicio ha sido registrado correctamente");
        } else {
            return back()->with("incorrecto","Eror el tipo servicio no ha sido registrado");
        }
        
    }
    public function update(Request $request){
        try
        {
            $sql=DB::update('update tipoServicios set nombre=? where idTipoServicio=?',[
                $request->nombre,
                $request->idTipoServicio
            ]);
            if($sql==0){
                $sql=1;
            }

        }
        catch (\Throwable $e )
        {
            $sql=0;
        }
        if ($sql>0) {
            return back()->with('correcto','El tipo servicio ha sido modificado');
        } else {
            return back()->with('incorrecto','Error el tipo servicio no ha sido modificado');
        }
        
        
    }
    public function delete($id){
    try
    {
        $sql=DB::delete("delete from tipoServicios where idtipoServicio=$id");
    }
    catch (\Throwable )
    {
        $sql=0;
    }
    if ($sql==true) {
        return back()->with("correcto","El tipo servicios ha sido eliminado correctamente");
    } else {
        return back()->with("incorrecto","Eror el tipo servicio no ha sido eliminado");
    }
    
    }
}



