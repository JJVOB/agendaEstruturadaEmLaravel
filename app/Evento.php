<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //use HasFactory;

    protected $fillable = [
        'titulo',
        'data_inicial',
        'datetime',
        'descricao',
        'cliente',
   ];
}
