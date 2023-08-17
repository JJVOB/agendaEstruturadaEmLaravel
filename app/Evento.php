<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{


    protected $fillable = [
        'titulo',
        'descricao',
        'data_inicial',
        'data_final',
        'cliente'
   ];


   public function getPordutosPesquisar(string $search = ''){

        $evento = $this->where(function($query) use($search){
            if ($search) {
              $query->where('nome',$search);
              $query->orWhere('nome','LIKE', "%{$search}");
            }
        })->get();
        return $evento;
   }
  
}
