<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{

    // Atributos preenchíveis em massa
    protected $fillable = [
        'titulo',
        'descricao',
        'data_inicial',
        'data_final',
        'cliente'
    ];

    // Função para buscar eventos com um termo de pesquisa
    public function buscarEventos(string $search = '')
    {
        $evento = $this->where(function ($query) use ($search) {
            if ($search) {
              $query->where('titulo',$search);
              $query->orWhere('titulo','LIKE', "%{$search}");
            }
        })->get(); // Realiza a consulta ao banco de dados

        return $evento; // Retorna a coleção de eventos encontrados
    }
}
