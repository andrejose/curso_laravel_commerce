<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;

class WelcomeController extends Controller
{

    private $categories;
    public function __construct(Category $category)
    {
        $this->middleware('guest');
        $this->categories = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 'Welcome';
    }

    public function exemplo()
    {
        //$nome = 'Teste';
        //$sobrenome = 'Sobrenome';
        //return view('exemplo')->with('nome', $nome);
        //return view('exemplo', compact('nome', 'sobrenome'));

        $categories = $this->categories->all();

        return view('exemplo', compact('categories'));

    }


}
