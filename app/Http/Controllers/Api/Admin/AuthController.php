<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Usuario;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends AdminController
{
    
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credenciais = [
            'nome_usuario' => $request->nome_usuario,
            'password' => $request->senha
        ];

        if (! $token = Auth::attempt($credenciais)) {
            throw new AuthenticationException();
        }

        return response()->json([
            'token' => $token,
            'usuario' => Usuario::find(Auth::id())
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function eu()
    {
        return response()->json([
            'usuario' => Usuario::find(Auth::id())
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();

        return response()->json(['mensagem' => 'Logout feito com sucesso']);
    }

}
