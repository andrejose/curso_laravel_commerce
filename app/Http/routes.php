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

// Exibe a mesma rota para mais de um verbo HTTP
//Route::match(['get', 'post'], 'exemplo', 'WelcomeController@exemplo');

//Route::any('exemplo2', function(){
//});

// Pegando uma categoria pela id
//Route::get('category/{id}', function($id){
//	$category = new \CodeCommerce\Category();
//	$c = $category->find($id);
//	return $c->name;
//});

Route::get('category/{category}', function(\CodeCommerce\Category $category){
	// Registra o parâmetro category no RouteServiceProvider
	// /laravel/laravel_commerce/app/Providers/RouteServiceProvider.php
	return $category->name;
});


// Definindo um nome para a rota
Route::get('produtos', ['as' => 'produtos', function(){
	return 'Produtos';
}]);

// Redireciona para uma rota específica
// return redirect()->route('produtos');

// Exibe o nome da rota atual
// echo Route::currentRouteName();

// Grupo de rotas que começam com admin/
Route::group(['prefix'=>'admin'], function(){

	Route::get('products', function(){
		return 'Products';
	});

});



//Adiciona uma regra para informar que o parâmetro deve ser inteiro com no mínimo 1 dígito
Route::pattern('id', '[0-9]+');


// Usando rota com parâmetro
// o ponto de interrogação informa que o parâmetro é opcional
Route::get('user/{id?}', function($id = null){

	if ($id)
		return "Olá, usuário $id";


	return 'Não possui ID';

}); 

//Adiciona uma regra para informar que o parâmetro deve conter apenas letras com no mínimo 1 dígito
//->where('id', '[A-Za-z]+');


Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('exemplo', 'WelcomeController@exemplo');

// Routes to Categories and Products
Route::get('admin/categories', 'AdminCategoriesController@index');
Route::get('admin/products', 'AdminProductsController@index');