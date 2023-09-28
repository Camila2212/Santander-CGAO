<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstablecimientoController extends Controller
{      
        //
        
        public function index(){
            $datos=DB::select('select * from establecimientos');
            return view('establecimiento')->with('datos',$datos);
        }
        public function create(Request $request){
            try
            {
                $sql=DB::insert("insert into establecimientos(idEstablecimiento, nombreEst, responsableEst, direccionEst, idServicio)values(NULL,?,?,?,?) ",[
                    $request->nombreEst,
                    $request->responsableEst,
                    $request->direccionEst,
                    $request->idServicio,

                ]);
                

            }
            catch (\Throwable )
            {
                $sql=0;
            }
            if ($sql==true) {
                return back()->with("correcto","El establecimiento ha sido registrado correctamente");
            } else {
                return back()->with("incorrecto","Error el establecimiento no ha sido registrado");
            }
            
        }
        public function update(Request $request){
            try
            {
                $sql=DB::update('update establecimientos set nombreEst=?,  responsableEst=?, direccionEst=?, idservicio=? where idEstablecimiento=?',[
                    $request->nombreEst,
                    $request->responsableEst,
                    $request->direccionEst,
                    $request->idServicio,
                    $request->idEstablecimiento,

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
                return back()->with('correcto','El establecimiento ha sido modificado');
            } else {
                return back()->with('incorrecto','Error el establecimiento no ha sido modificado');
            }
            
            
        }
        public function delete($id){
        try
        {
            $sql=DB::delete("delete from establecimientos where idEstablecimiento=$id");
        }
        catch (\Throwable )
        {
            $sql=0;
        }
        if ($sql==true) {
            return back()->with("correcto","El Establecimiento ha sido eliminado correctamente");
        } else {
            return back()->with("incorrecto","Error el establecimiento no ha sido eliminado");
        }
        
        }
    }
    
    
    
    


