<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{

        
        //
        
        public function index(){
            

            $datos=DB::select('select * from Servicios');
           
            return view('servicio')->with('datos',$datos);
        }
        public function create(Request $request){
            try
            {
                $sql=DB::insert("insert into servicios(idServicio, nombreServicio, descripcionServicio, idTipoServicio)values(NULL,?,?,?) ",[
                    $request->nombreServicio,
                    $request->descripcionServicio,
                    $request->idTipoServicio,
                ]);
                

            }
            catch (\Throwable )
            {
                $sql=0;
            }
            if ($sql==true) {
                return back()->with("correcto","El servicio ha sido registrado correctamente");
            } else {
                return back()->with("incorrecto","Error el servicio no ha sido registrado");
            }
            
        }
        public function update(Request $request){
            try
            {
                $sql=DB::update('update servicios set nombreServicio=?,  descripcionServicio=?, idTipoServicio=? where idServicio=?',[
                    $request->nombreServicio1,
                    $request->descripcionServicio1,
                    $request->idTipoServicio1,
                    $request->idServicio1
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
                return back()->with('correcto','El servicio ha sido modificado');
            } else {
                return back()->with('incorrecto','Error el servicio no ha sido modificado');
            }
            
            
        }
        public function delete($id){
        try
        {
            $sql=DB::delete("delete from servicios where idServicio=$id");
        }
        catch (\Throwable )
        {
            $sql=0;
        }
        if ($sql==true) {
            return back()->with("correcto","El servicios ha sido eliminado correctamente");
        } else {
            return back()->with("incorrecto","Error el servicio no ha sido eliminado");
        }
        
        }
    }
    
    
    
    
