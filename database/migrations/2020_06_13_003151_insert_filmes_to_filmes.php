<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertFilmesToFilmes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('filmes')->insert([
            'classificacao_id'=>'1',
            'titulo' =>  'Como treinar seu dragão 3',
            'ano_lancamento' => '2019',
            'genero' => 'aventura fantasia comédia'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

      DB::delete('DELETE FROM filmes WHERE titulo = ? ', 'Como treinar seu dragão 3');

    }
}
