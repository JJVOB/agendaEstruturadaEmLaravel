<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentosAnterioresController extends Controller
{
    public function agendamentosAnteriores(){
        var_dump($_GET);
        return view('site.agendamentosAnteriores');
    }
}
