<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_inicial',
        'data_final',
        'cliente'
   ];
  
}
