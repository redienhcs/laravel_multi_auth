<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas dos clientes
|--------------------------------------------------------------------------
|
*/

Route::post('login', 'AuthController@login')->name('login');

Route::middleware('auth:cliente')->group(function () {
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('eu', 'AuthController@eu')->name('eu');

    Route::get('teste-rota', function () {
        return response()->json('Uma rota de teste dentro da rota de clientes', 200);
    });
});

Route::get('cidades', function () {
    $arrayCidades = [];
    $arrayCidades[] = array('id'=> 1, 'descricao'=>'Estrela');
    $arrayCidades[] = array('id'=> 2, 'descricao'=>'Lajeado');
    $arrayCidades[] = array('id'=> 2, 'descricao'=>'Arroio do Meio');
    return response()->json( $arrayCidades, 200);
});
