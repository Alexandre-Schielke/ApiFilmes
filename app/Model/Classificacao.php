<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{

    protected $table = 'classificacoes';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'titulo',
    ];
    public $timestamps = false;
}
