<?php


//Route::get('/painel/produtos/testes', 'Painel\ProdutoController@tests');
Auth::routes();
/*Route::resource ('/painel/produtos','Painel\ProdutoController');
Route::resource ('/painel/clientes','Painel\ClientesController');
Route::resource ('/painel/instrutores','Painel\InstrutoresController'); */
Route::get ('/login','Auth\LoginController@login');
Route::post('/login','Auth\LoginController@entrar');
Route::get ('/logout',function (){
    Illuminate\Support\Facades\Auth::logout();
        return redirect ('/login');
});


Route::group (['namespace'=> 'Site' ], function () {
    Route::get('/categoria/{idCat}','SiteController@categoria');
    Route::get('/categoria2/{idCat?}','SiteController@categoriaOp');
    Route::get('/contato','SiteController@contato');
    Route::get('/','SiteController@index');

});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource ('/painel/produtos','Painel\ProdutoController');
    Route::resource ('/painel/clientes','Painel\ClientesController');
    Route::resource ('/painel/instrutores','Painel\InstrutoresController');
    Route::resource ('/painel/clientesRelatorio','Painel\ClientesRelatorioController');

});



Route::get('/home', 'HomeController@index');
