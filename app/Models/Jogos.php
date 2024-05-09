<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogos extends Model
{
    protected $fillable = [
        'nome',
        'preco',
        'descricao',
        'classificacao',
        'plataformas',
        'desenvolvedor',
        'distribuidora',
        'categoria'
    ];
}
