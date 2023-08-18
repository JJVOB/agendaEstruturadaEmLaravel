<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    // Função para exibir a página principal
    public function principal()
    {
        return view('site.principal'); // Retorna a visualização 'site.principal'
    }
}
