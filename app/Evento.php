<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $eventos = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('titulo', 'LIKE', "%{$search}%")
                      ->orWhere('descricao', 'LIKE', "%{$search}%")
                      ->orWhere('cliente', 'LIKE', "%{$search}%");
            }
        })->get(); // Realiza a consulta ao banco de dados

        return $eventos; // Retorna a coleção de eventos encontrados
    }
}
