<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celdas;

class CeldasController extends Controller
{
    public function createCelda(Request $request)
    {   

        Celdas::create([
            'nombre' => $request->input('nombre'),
            'id_modulo' => $request->input('id_modulo'),
            'capacidad' => $request->input('capacidad'),
            'n_reclusos' => $request->input('n_reclusos'),
           
        ]);

        return response()->json('ok', 200);
    }

    public function updateCelda($id, Request $request)
    {   
      
        $nombre = $request->input('nombre');
        $id_modulo = $request->input('id_modulo');
        $capacidad = $request->input('capacidad');
        $n_reclusos = $request->input('n_reclusos');

        $celda = Celdas::find($id);

        $celda->update(['nombre' => $nombre, 'id_modulo' => $id_modulo, 'capacidad' => $capacidad
            , 'n_reclusos' => $n_reclusos]);

        return response()->json($celda, 200);
    }

    public function showCelda($id)
    {
        $celda = Celdas::find($id);

        return response()->json($celda, 200);
    }


    public function deleteCelda($id)
    {
        Celdas::findOrFail($id)->delete();

        return response(['message' => 'Success'], 200);
    }
}
