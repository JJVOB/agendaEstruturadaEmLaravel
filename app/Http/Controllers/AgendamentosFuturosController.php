<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentosFuturosController extends Controller
{
    public function agendamentosFuturos(){
        //var_dump($_GET);
        return view('site.agendamentosFuturos');
    }
}
