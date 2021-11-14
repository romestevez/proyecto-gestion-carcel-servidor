<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recluso;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ReclusoController extends Controller
{
    //
    public function createRecluso(Request $request)
    {   

        $image_path = $request->file('foto');
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('reclusos')->put($image_path_name, File::get($image_path));
        }
        else{
            $image_path_name = 'AvatarPorDefecto.png';
        }

        Recluso::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'edad' => $request->input('edad'),
            'foto' =>  $image_path_name,
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


    public function showAllReclusos(Request $request)
    {
        $reclusos = Recluso::query();

        if ($request->has('q')) {
            $reclusos = $reclusos->where('nombre', 'LIKE', "%{$request->get('q')}%");
        }

        $reclusos = $reclusos->get();

        return response()->json($reclusos, 200);
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
