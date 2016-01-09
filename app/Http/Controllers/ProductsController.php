<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

// Importa os modelos utilizados
use CodeCommerce\Product,
    CodeCommerce\Category,
    CodeCommerce\ProductImage,
    File,
    Storage;

class ProductsController extends Controller
{
	// Cria uma variável privada que vai guardar o modelo
    private $productModel;

	// Função construtora que importa o Modelo do produto
	public function __construct(Product $productModel)
	{
		// Atribui o modelo importado à variável privada
		$this->productModel = $productModel;
	}
    //
    public function index()
    {

    	// all() -> recupera todos os registros do banco de dados
    	$products = $this->productModel->paginate(10);

    	// Exibe o arquivo da view, passando a variável das produtos
    	return view('products.index', compact('products'));
    }

    // Ação que exibe a página de cadastro de umo produto
    public function create(Category $category)
    {
        // Seleciona todas as categorias como objeto
        //$categories = $category->all();
        // Seleciona todas as categorias como array
        //https://laravel.com/docs/5.1/collections#method-merge
        $categories = [''=>'Select'] + $category->lists('name', 'id')->all();

    	return view('products.create', compact('categories'));
    }

    // Ação que grava um novo registro no banco
    public function store(Requests\ProductRequest $request)
    {

        // Pega todos os dados recebidos na requisição
        $input = $request->all();

        // Criar uma nova instância do modelo de product já preenchendo com os dados da requisição
        $product = $this->productModel->fill($input);

        // Salva os dados no BD
        $product->save();

        // Redireciona para a página de listagem
        //return redirect('products');
        return redirect()->route('products');

    }

    // Função para exibir o formulário de edição de um registro
    public function edit($id, Category $category) {
        $product = $this->productModel->find($id);
        $categories = [''=>'Select'] + $category->lists('name', 'id')->all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Função para atualizar os dados do registro no banco
    public function update(Requests\ProductRequest $request, $id)
    {
        // Atualiza os dados no banco
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products');
    }

    // Ação para apagar o registro do banco de dados
    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('products');
    }

    //
    public function images($productId)
    {
        $product = $this->productModel->find($productId);
        return view('products.images', compact('product'));
    }


    public function createImage($productId)
    {
        $product = $this->productModel->find($productId);

        return view('products.create_image', compact('product'));
    }


    public function storeImage(Request $request, $productId, ProductImage $productImage)
    {

        // Pega o arquivo enviado pelo formulário
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        // Grava a imagem no banco de dados
        $image = $productImage::create(['product_id' => $productId, 'extension' => $extension ]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        //return redirect()->route('products.images', ['product' => $productId]);


    }


}
