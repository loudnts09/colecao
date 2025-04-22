<?php

use App\Models\User;
use App\Models\Figura;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/users', ['uses' => 'TesteController@users']);

Route::get('/sortearNumero', function(){
    print(rand(1, 10));
});

Route::get('/pesquisarFigura/{nome?}', function(string $nome = 'sem nome'){
    $figuras = Figura::where('nome', 'LIKE', '%' . $nome . '%')->get();
    foreach($figuras as $figura){
        print("<b>Nome:</b> {$figura->nome} - <b>Figura:</b> {$figura->categoria->nome} - <b>Prateleira:</b> {$figura->prateleira->nome} - <b>Coleção:</b> {$figura->categoria->colecao->nome}");
        print('<br>');
    }
});