<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentosAnterioresController extends Controller
{
    public function agendamentosAnteriores(){
        return view('site.agendamentosAnteriores');
    }
}
