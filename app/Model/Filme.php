<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{

    protected $table = 'filmes';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'classificacao_id',
        'titulo',
        'ano_lancamento',
        'genero'
    ];
    public $timestamps = false;
}
