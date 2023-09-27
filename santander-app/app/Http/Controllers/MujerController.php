<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MujerController extends Controller
{
    public function index(){
        $datos=DB::select('select * from mujerCuidadora');
        return view('mujer')->with('datos',$datos);
    }
    public function create(Request $request){
        // try
        // {
            $sql=DB::insert("insert into mujercuidadora(idMujer, tipoDocMujer, numeroDocMujer, nombreMujer, apellidoMujer,
             telefonoMujer, correoMujer, ciudadMujer, direccionMujer, ocupacionMujer)values(Null,?,?,?,?,?,?,?,?,?)",[
                $request->idMujer,
                $request->tipoDocMujer,
                $request->numeroDocMujer,
                $request->nombreMujer,
                $request->apellidoMujer,
                $request->telefonoMujer,
                $request->correoMujer,
                $request->ciudadMujer,
                $request->direccionMujer,
                $request->ocupacionMujer

                
            ]);
        // }
        
        
    }
//     public function update(Request $request){
//         try
//         {
//             $sql=DB::update('update aprendices set nombre=?, apellido=? where idAprendiz=? ',[
//                 $request->nombre,
//                 $request->apellido,
//                 $request->id
//             ]);
//             if($sql==0){
//                 $sql=1;
//             }
//         }
//         catch (\Throwable )
//         {
//             $sql=0;
//         }
//         if ($sql==true) {
//             return back()->with('correcto','El aprendiz ha sido modificado');
//         } else {
//             return back()->with('incorrecto','Error el aprendiz no ha sido modificado');
//         }
        
//     }
//     public function delete($id){
//     try
//     {
//         $sql=DB::delete("delete from aprendices where idAprendiz=$id");
//     }
//     catch (\Throwable )
//     {
//         $sql=0;
//     }
//     if ($sql==true) {
//         return back()->with("correcto","El aprendiz ha sido eliminado correctamente");
//     } else {
//         return back()->with("incorrecto","Eror el aprendiz no ha sido eliminado");
//     }
    
//     }
}
