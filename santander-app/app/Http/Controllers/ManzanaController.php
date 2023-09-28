<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManzanaController extends Controller
{
    public function index(){
            $datos=DB::select('select * from manzanasdelcuidado');
            return view('manzana')->with('datos',$datos);
    
        }
        public function create(Request $request)
{try
            {

                $sql=DB::insert("insert into manzanasdelcuidado(idManzana, nombreManzana, idCiudad, localidadManzana, direccionManzana)values(Null,?,?,?,?)",[
                   
                   $request->nombreManzana,
                   $request->idCiudad,
                   $request->localidadManzana,
                   $request->direccionManzana,   
                   
               ]);

                
               
                
                
  
            }catch (\Throwable $e) 


            {
                $sql=0;
            }
            if ($sql==true) {
                return back()->with('correcto','La manzana ha sido registrado con exito');
            } else {
                return back()->with('incorrecto','Error La manzana no ha sido registrado');
            }
            
        }
        public function update(Request $request){
            try
            {
                $sql=DB::update('update manzanasdelcuidado set nombreManzana=?, idciudadd=? localidadManzana=? where idManzana=?',[
                  $request->nombreManzana,
                  $request->idCiudad,
                  $request->localidadManzana,
                  $request->id
                ]);
                if ($sql==0) {
                    $sql=1;
                }
            }
            catch (\Throwable )
            {
                $sql=0;
            }
            if ($sql==true) {
                return back()->with('correcto',' La manzana ha sido modificado');
            } else {
                return back()->with('incorrecto','Error  La manzana no ha sido modificado');
            }
            
        }
        public function delete($id){
            try
            {
                $sql=DB::delete("delete from manzanasdelcuidado where idManzana=$id");
                
            }
            catch (\Throwable )
            {
                $sql=0;
            }
            if ($sql==true) {
                return back()->with("correcto","La manzana  ha sido eliminado correctamente");
            } else {
                return back()->with("incorrecto","Eror La manzana  no ha sido eliminado");
            }
        
            }
    

            



}