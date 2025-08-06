<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!Auth::attempt($credenciais)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }
        $usuario = User::where('email', $request->email)->first();
        $token = $usuario->createToken('token')->plainTextToken;
        return response()->json([
            'acesso_token' => $token,
            'tipo_token' => 'Bearer',
        ]);
    }

}