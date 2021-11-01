<?php

namespace App\Http\Controllers\Api\Clientes;

use App\Http\Controllers\ClientesController;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ClientesController
{

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credenciais = [
            'nome_cliente' => $request->nome_cliente,
            'password' => $request->senha,
            // 'ativo' => true
        ];

        if (! $token = Auth::attempt($credenciais)) {
            // dd( $credenciais);
            throw new AuthenticationException('Erro na autenticação');
        }

        return response()->json([
            'token' => $token,
            'usuario' => Auth::user()
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
            'usuario' => Auth::user()
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
