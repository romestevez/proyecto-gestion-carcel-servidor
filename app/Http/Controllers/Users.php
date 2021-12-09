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



    public function user()
    {
        return Auth::user();
    }

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
        
        Auth::attempt($request->only('email', 'password'));

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24); // 1 day
        

        return response([
            Auth::user()
        ])->withCookie($cookie);
    }

    public function updateUser($id, Request $request)
    {   
      
        $data = $request->all();
        $user = User::find($id);
        $user->update($data);
        return response()->json($data, 200);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        return response()->json($user, 200);
    }

    public function UserInfo(Request $request)
    {
        $user_id = $request->input('user_id');

        $user_info = DB::table('users')
            ->where('id', '=', $user_id)
            ->select('nombre', 'apellido', 'edad', 'email', 'n_tlf','dni','rol', 'password')
            ->get();

            return response()->json($user_info, 200);
    }

    public function showAllUser(Request $request)
    {

        if ($request->has('q')) {
            $users = User::where('nombre', 'LIKE', "%{$request->get('q')}%")->paginate(5); 
        } else {
            $users = User::paginate(2);
        }

        return response()->json($users, 200);
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();

        return response(['message' => 'Success'], 200);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid credentials!'
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24); // 1 day

        return response([
            $token,
            Auth::user()
        ])->withCookie($cookie);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'Success'
        ]);
    }

}