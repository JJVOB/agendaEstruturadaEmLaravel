<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentosFuturosController extends Controller
{
    public function agendamentosFuturos(){
        return view('site.agendamentosFuturos');
    }
}
