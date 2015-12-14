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

    // Ação que grava um novo registro no banco
    public function store(Requests\CategoryRequest $request)
    {

        // Pega todos os dados recebidos na requisição
        $input = $request->all();

        // Criar uma nova instância do modelo de category já preenchendo com os dados da requisição
        $category = $this->categoryModel->fill($input);

        // Salva os dados no BD
        $category->save();

        // Redireciona para a página de listagem
        //return redirect('categories');
        return redirect()->route('categories');

    }

    // Função para exibir o formulário de edição de um registro
    public function edit($id) {
        $category = $this->categoryModel->find($id);
        return view('categories.edit', compact('category'));
    }

    // Função para atualizar os dados do registro no banco
    public function update(Requests\CategoryRequest $request, $id)
    {
        // Atualiza os dados no banco
        $this->categoryModel->find($id)->update($request->all());
        return redirect()->route('categories');
    }

    // Ação para apagar o registro do banco de dados
    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();
        return redirect()->route('categories');
    }

}
