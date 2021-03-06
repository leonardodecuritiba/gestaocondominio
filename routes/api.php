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

//Route::resource('contatos', 'ContatoController');
//Route::resource('telefones', 'TelefoneController');
//Route::resource('emails', 'EmailController');
/*
|--------------------------------------------------------------------------
| API Basic Routes - FINANCEIRO
|--------------------------------------------------------------------------
*/
//financeiro_base_v1.a
Route::resource('grupo_lancamentos', 'GrupoLancamentoController');
Route::resource('tipo_lancamentos', 'TipoLancamentoController');
Route::resource('tipo_inadimplencias', 'TipoInadimplenciaController');
Route::resource('situacao_inadimplencias', 'SituacaoInadimplenciaController');
//financeiro_bancario_v1.a
Route::resource('bancos', 'BancoController');
Route::resource('conta_bancarias', 'ContaBancariaController');
//financeiro_estoque_v1.a
Route::resource('unidade_produtos', 'UnidadeProdutoController');
Route::resource('grupo_produtos', 'GrupoProdutoController');
Route::resource('produtos', 'ProdutoController');
//financeiro_diversos_v1.a
Route::resource('departamentos', 'DepartamentoController');
Route::resource('feriados', 'FeriadoController');
Route::resource('layout_arquivos', 'LayoutArquivoController');

//financeiro_receitas_v1.a
Route::resource('pre_lancamentos', 'PreLancamentoController');
Route::resource('lancamento_recorrentes', 'LancamentoRecorrenteController');
Route::resource('lancamento_avulsos', 'LancamentoAvulsoController');
Route::resource('lancamentos', 'LancamentoController');
Route::resource('recebimentos', 'RecebimentoController');
