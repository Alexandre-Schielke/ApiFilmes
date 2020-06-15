<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'perfil',
        'ativo',
    ];
    public $timestamps = false;

//

}
