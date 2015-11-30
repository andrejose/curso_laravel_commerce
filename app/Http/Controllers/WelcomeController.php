<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class WelcomeController extends Controller
{
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
        $nome = 'Teste';
        $sobrenome = 'Sobrenome';

        //return view('exemplo')->with('nome', $nome);
        return view('exemplo', compact('nome', 'sobrenome'));
    }


}
