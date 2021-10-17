<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recluso;

class ReclusoController extends Controller
{
    //
    public function createRecluso(Request $request)
    {   

        Recluso::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'edad' => $request->input('edad'),
            'foto' => $request->input('foto'),
            'descripcion' => $request->input('descripcion'),
            'dni' => $request->input('dni'),
            'id_celda' => $request->input('id_celda'),
        ]);

        return response()->json('ok', 200);
    }

    public function updateRecluso($id, Request $request)
    {   
      
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $edad = $request->input('edad');
        $foto = $request->input('foto');
        $descripcion = $request->input('descripcion');
        $dni = $request->input('dni');
        $id_celda = $request->input('id_celda');

        $recluso = Recluso::find($id);

        $recluso->update(['nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad
            , 'foto' => $foto, 'descripcion' => $descripcion, 'dni' => $dni, 'id_celda' => $id_celda]);

        return response()->json($recluso, 200);
    }

    public function showRecluso($id)
    {
        $recluso = Recluso::find($id);

        return response()->json($recluso, 200);
    }


    public function deleteRecluso($id)
    {
        Recluso::findOrFail($id)->delete();

        return response(['message' => 'Success'], 200);
    }
}
