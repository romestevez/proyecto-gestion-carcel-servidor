<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class Users extends Controller
{





    public function createUser(Request $request)
    {   

        User::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'edad' => $request->input('edad'),
            'email' => $request->input('email'),
            'n_tlf' => $request->input('n_tlf'),
            'dni' => $request->input('dni'),
            'password' => Hash::make($request->input('password')),
            'rol' => $request->input('rol'),
        ]);

        return response()->json('ok', 200);
    }

    public function updateUser($id, Request $request)
    {   
      
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $edad = $request->input('edad');
        $email = $request->input('email');
        $n_tlf = $request->input('n_tlf');
        $dni = $request->input('dni');
        $rol = $request->input('rol');
        $password = $request->input('password');

        $user = User::find($id);

        $user->update(['nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad
            , 'email' => $email, 'n_tlf' => $n_tlf, 'dni' => $dni, 'rol' => $rol
            , 'password' => Hash::make($password)]);

        return response()->json($user, 200);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        return response()->json($user, 200);
    }


    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();

        return response(['message' => 'Success'], 200);
    }


}
