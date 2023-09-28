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
                  // // Verificar si el idTipoServicio existe en la base de datos de tipo servicios
                  $tipoServicioExists = DB::table('tipoServicios')->where('idTipoServicio', $request->idTipoServicio)->exists();

                  if (!$tipoServicioExists) {
                      
                      return back()->with('incorrecto', 'El tipo servicio no existe en la base de datos.');
                  }
  
                  // Si el tipo servicio existe, inserta el nuevo servicio
                  $sql = DB::table('servicios')->insert([
                      'nombreServicio' => $request->nombreServicio,
                      'descripcionServicio' => $request->descripcionServicio,
                      'idTipoServicio' => $request->idTipoServicio,

                      
                  ]);


            }
            catch (\Throwable )
            {
                $sql=0;
            }
            if ($sql==true) {
                return back()->with("correcto","El servicio ha sido registrado correctamente");
            } else {
                return back()->with("incorrecto","Eror el servicio no ha sido registrado");
            }
            
        }
        public function update(Request $request){
            try
            {
                $sql=DB::update('update servicios set nombreServicio=?,  descripcionServicio=?, idTipoServicio=? where idServicio=?',[
                    $request->nombreServicio,
                    $request->descripcionServicio,
                    $request->idTipoServicio,
                    $request->idServicio
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
            return back()->with("incorrecto","Eror el servicio no ha sido eliminado");
        }
        
        }
    }
    
    
    
    
