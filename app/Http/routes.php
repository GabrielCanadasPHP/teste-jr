<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(["prefix" => "admin"], function(){
    
    Route::get('/login',['as'=>'admin.login', function(){
        return view('admin.login.index');
    }]);

    Route::post('/login',['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);

    Route::group(["middleware" => "auth"], function() {

        Route::get('/login/sair',['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

        Route::get('/',['as'=>'admin.principal', function() {
            $data = [
                "vendedores" => \App\Vendedor::all(),
                "produtos" => \App\Produto::all()
            ];

            return view('admin.principal.index', $data);
        }]);

        //Crud Vendedor
        Route::group(["prefix" => "vendedores"], function() {

            Route::get('/',['as'=>'admin.vendedores', 'uses'=>'Admin\VendedorController@index']);
            Route::get('/adicionar',['as'=>'admin.vendedores.adicionar', 'uses'=>'Admin\VendedorController@adicionar']);
            Route::post('/salvar',['as'=>'admin.vendedores.salvar', 'uses'=>'Admin\VendedorController@salvar']);
            Route::get('/editar/{id}',['as'=>'admin.vendedores.editar', 'uses'=>'Admin\VendedorController@editar']);
            Route::put('/atualizar/{id}',['as'=>'admin.vendedores.atualizar', 'uses'=>'Admin\VendedorController@atualizar']);
            Route::get('/deletar/{id}',['as'=>'admin.vendedores.deletar', 'uses'=>'Admin\VendedorController@deletar']);
        });

        Route::group(["prefix" => "produtos"], function() {
            //Crud Produtos
            Route::get('/',['as'=>'admin.produtos', 'uses'=>'Admin\ProdutoController@index']);
            Route::get('/adicionar',['as'=>'admin.produtos.adicionar', 'uses'=>'Admin\ProdutoController@adicionar']);
            Route::get('/editar/{id}',['as'=>'admin.produtos.editar', 'uses'=>'Admin\ProdutoController@editar']);
            Route::post('/salvar',['as'=>'admin.produtos.salvar', 'uses'=>'Admin\ProdutoController@salvar']);
            Route::get('/deletar/{id}',['as'=>'admin.produtos.deletar', 'uses'=>'Admin\ProdutoController@deletar']);
        });

        Route::post("/realizar-venda", ["as" => "admin.venda", "uses" => "Admin\VendaController@vender"]);
    });

});

/* Foca no código
        .---.
       /o   o\
    __(=  "  =)__
     //\'-=-'/\\
        )   (_
       /      `"=-._
      /       \     ``"=.
     /  /   \  \         `=..--.
 ___/  /     \  \___      _,  , `\
`-----' `""""`'-----``"""`  \  \_/
                             `-`
*/
