<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacionController extends Controller
{
    public function register(Request $request)
    {
        // Valida los datos de entrada (nombre, email, contraseña, etc.)

        $request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|string|max:30',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Genera un token para el usuario recién registrado
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        // Valida los datos de inicio de sesión (email, contraseña)

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'No autorizado, revisar usuario o contraseña'], 401);
    }
}
