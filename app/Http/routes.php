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

/*
Route::get('category/{category}', function(\CodeCommerce\Category $category){
	// Registra o parâmetro category no RouteServiceProvider
	// /laravel/laravel_commerce/app/Providers/RouteServiceProvider.php
	return $category->name;
});
*/
// Cria um grupo de rotas com o prefixo 'admin' e cria uma validação
// do parâmetro 'id' que deve sempre ser numérico
Route::group(['prefix'=>'admin', 'where' => ['id'=>'[0-9]+']], function(){

	Route::group(['prefix'=>'categories'], function(){
		Route::get('', ['as'=>'categories', 'uses'=>'CategoriesController@index']);
		Route::post('', ['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
		Route::get('create', ['as'=>'categories.create', 'uses'=> 'CategoriesController@create']);
		Route::get('{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
		Route::get('{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
		Route::put('{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
	});

	Route::group(['prefix'=>'products'], function(){
		Route::get('', ['as'=>'products', 'uses'=>'ProductsController@index']);
		Route::post('', ['as'=>'products.store', 'uses'=>'ProductsController@store']);
		Route::get('create', ['as'=>'products.create', 'uses'=> 'ProductsController@create']);
		Route::get('{id}/destroy', ['as'=>'products.destroy', 'uses'=>'ProductsController@destroy']);
		Route::get('{id}/edit', ['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
		Route::put('{id}/update', ['as'=>'products.update', 'uses'=>'ProductsController@update']);

		Route::group(['prefix'=>'images'], function(){
			// site.com.br/admin/products/images/122/images
			Route::get('{product}', ['as'=>'products.images', 'uses'=>'ProductsController@images']);
			Route::get('{product}/create', ['as'=>'products.images.create', 'uses'=>'ProductsController@createImage']);
			Route::post('{product}', ['as'=>'products.images.store', 'uses'=>'ProductsController@storeImage']);


		});
	});
});

//Route::resource('photo', 'PhotoController');

// Definindo um nome para a rota
Route::get('produtos', ['as' => 'produtos', function(){
	return 'Produtos';
}]);

// Redireciona para uma rota específica
// return redirect()->route('produtos');

// Exibe o nome da rota atual
// echo Route::currentRouteName();



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
//Route::get('admin/categories', 'AdminCategoriesController@index');
//Route::get('admin/products', 'AdminProductsController@index');