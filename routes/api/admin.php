<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas da administração
|--------------------------------------------------------------------------
|
*/

Route::post('login', 'AuthController@login');

Route::middleware('auth:admin')->group(function () {
    Route::post('logout', 'AuthController@logout');
    Route::post('eu', 'AuthController@eu');

    Route::get('teste', function () {
        return response()->json('Uma rota de teste dentro da rota de administração', 200);
    });
});