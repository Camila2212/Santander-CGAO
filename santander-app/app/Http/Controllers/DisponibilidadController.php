<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisponibilidadController extends Controller
{

    //

    public function index()
    {
        $datos = DB::select('select * from disponibilidades');
        return view('disponibilidad')->with('datos', $datos);
    }
    public function create(Request $request)
    {
        try {
            $sql = DB::insert("insert into disponibilidades(idDisponibilidad, fechaDisponibilidad, idManzana, idMujer, idServicio)values(NULL,?,?,?,?) ", [
                $request->fechaDisponibilidad,
                $request->idManzana,
                $request->idMujer,
                $request->idServicio,

            ]);
        } catch (\Throwable) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "La propuesta ha sido registrada correctamente");
        } else {
            return back()->with("incorrecto", "Error la propuesta no ha sido registrada");
        }
    }
    public function update(Request $request)
    {
        try {
            $sql = DB::update('update disponibilidades set fechaDisponibilidad=?,  idManzana=?, idMujer=?, idservicio=? where idDisponibilidad=?', [
                $request->fechaDisponibilidad,
                $request->idManzana,
                $request->idMujer,
                $request->idServicio,
                $request->idDisponibilidad,

            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $e) {
            $sql = 0;
        }
        if ($sql > 0) {
            return back()->with('correcto', 'La propuesta ha sido modificado');
        } else {
            return back()->with('incorrecto', 'Error la propuesta no ha sido modificado');
        }
    }
    public function delete($id)
    {
        try {
            $sql = DB::delete("delete from disponibilidades where idDisponibilidad=$id");
        } catch (\Throwable) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "La propuesta ha sido eliminada correctamente");
        } else {
            return back()->with("incorrecto", "Error la propuesta no ha sido eliminada");
        }
    }
}
