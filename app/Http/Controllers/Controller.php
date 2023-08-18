<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // Utiliza traits para incorporar funcionalidades específicas ao controlador base

    use AuthorizesRequests; // Fornece métodos para autorização de acesso

    use DispatchesJobs; // Permite despachar trabalhos (jobs) em filas

    use ValidatesRequests; // Fornece métodos para validação de requisições
}
