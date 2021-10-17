<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial;

class HistorialController extends Controller
{
    public function createHistorial(Request $request)
    {   

        Historial::create([
            'id_recluso' => $request->input('id_recluso'),
            'f_entrada' => $request->input('f_entrada'),
            'f_salida' => $request->input('f_salida'),
            'antecedentes' => $request->input('antecedentes'),
            'reincidente' => $request->input('reincidente'),
        ]);

        return response()->json('ok', 200);
    }

    public function updateHistorial($id, Request $request)
    {   
      
        $id_recluso = $request->input('id_recluso');
        $f_entrada = $request->input('f_entrada');
        $f_salida = $request->input('f_salida');
        $antecedentes = $request->input('antecedentes');
        $reincidente = $request->input('reincidente');

        $historial = Historial::find($id);

        $historial->update(['id_recluso' => $id_recluso, 'f_entrada' => $f_entrada, 'f_salida' => $f_salida
            , 'antecedentes' => $antecedentes, 'reincidente' => $reincidente]);

        return response()->json($historial, 200);
    }

    public function showHistorial($id)
    {
        $historial = Historial::find($id);

        return response()->json($historial, 200);
    }


    public function deleteHistorial($id)
    {
        Historial::findOrFail($id)->delete();

        return response(['message' => 'Success'], 200);
    }
}
