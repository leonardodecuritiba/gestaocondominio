<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

/*
|--------------------------------------------------------------------------
| API Basic Routes
|--------------------------------------------------------------------------
*/
Route::resource('ramo_atividades', 'RamoAtividadeController');
Route::resource('tipo_correspondencias', 'TipoCorrespondenciaController');
Route::resource('tipo_telefones', 'TipoTelefoneController');
Route::resource('localidades', 'LocalidadeController');
Route::resource('situacao_imovels', 'SituacaoImovelController');
Route::resource('tipo_area_externas', 'TipoAreaExternaController');
Route::resource('associados', 'AssociadoController');
Route::resource('telefones', 'TelefoneController');
Route::resource('emails', 'EmailController');
Route::resource('dependentes', 'DependenteController');

Route::resource('imovels', 'ImovelController');
Route::resource('documentos', 'DocumentoController');
Route::resource('area_externas', 'AreaExternaController');
Route::resource('imovel_permanentes', 'ImovelPermanenteController');

//financeiro
Route::resource('grupo_lancamentos', 'GrupoLancamentoController');
Route::resource('tipo_lancamentos', 'TipoLancamentoController');
Route::resource('tipo_inadimplencias', 'TipoInadimplenciaController');
Route::resource('situacao_inadimplencias', 'SituacaoInadimplenciaController');



//Route::resource('contatos', 'ContatoController');
//Route::resource('telefones', 'TelefoneController');
//Route::resource('emails', 'EmailController');