<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

// Importa os modelos utilizados
use CodeCommerce\Category;

class CategoriesController extends Controller
{
	// Cria uma variável privada que vai guardar o modelo
	private $categoryModel;

	// Função construtora que importa o Modelo da categoria
	public function __construct(Category $categoryModel)
	{
		// Atribui o modelo importado à variável privada
		$this->categoryModel = $categoryModel;
	}
    //
    public function index()
    {

    	// all() -> recupera todos os registros do banco de dados
    	$categories = $this->categoryModel->all();

    	// Exibe o arquivo da view, passando a variável das categorias
    	return view('categories.index', compact('categories'));
    }

    // Ação que exibe a página de cadastro de uma categoria
    public function create()
    {
    	return view('categories.create');
    }

}
