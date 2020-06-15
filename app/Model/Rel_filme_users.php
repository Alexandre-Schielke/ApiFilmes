<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Rel_filme_users extends Model
{
    protected $table = 'rel_filme_user';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'filme_id',
    ];
    public $timestamps = false;
}
