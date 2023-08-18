<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
  protected $fillable = [
        'titulo',
        'descricao',
        'data_inicial',
        'data_final',
        'cliente'
   ];


   public function buscarEventos(string $search = ''){

        $evento = $this->where(function($query) use ($search) {
            if ($search) {
              $query->where('nome',$search);
              $query->orWhere('nome','LIKE', "%{$search}%");
            }
        })->get();
        return $evento;
   }
  
}
