<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulos;

class ModulosController extends Controller
{
    public function createModulo(Request $request)
    {   

        Modulos::create([
            'nombre' => $request->input('nombre'),
            'nivel_peligrosidad' => $request->input('nivel_peligrosidad'),
        ]);

        return response()->json('ok', 200);
    }

    public function updateModulo($id, Request $request)
    {   
      
        $nombre = $request->input('nombre');
        $nivel_peligrosidad = $request->input('nivel_peligrosidad');

        $modulo = Modulos::find($id);

        $modulo->update(['nombre' => $nombre, 'nivel_peligrosidad' => $nivel_peligrosidad]);

        return response()->json($modulo, 200);
    }

    public function showModulo($id)
    {
        $modulo = Modulos::find($id);

        return response()->json($modulo, 200);
    }


    public function deleteModulo($id)
    {
        Modulos::findOrFail($id)->delete();

        return response(['message' => 'Success'], 200);
    }
}
