<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory; // Utiliza o Factory para facilitar a criação de instâncias do modelo

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
                // Condição de busca pelo nome
                $query->where('nome', $search);
                // Condição de busca pelo nome parcial (LIKE)
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get(); // Realiza a consulta ao banco de dados

        return $evento; // Retorna a coleção de eventos encontrados
    }
}
