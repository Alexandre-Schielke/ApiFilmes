<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class InsertGenerosToGeneros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//
//            $arGenero = [
//                'Ação',
//                'Animação',
//                'Aventura',
//                'Cinema de arte',
//                'Chanchada',
//                'Comédia',
//                'Comédia romântica',
//                'Comédia dramática',
//                'Comédia de ação',
//                'Dança',
//                'Documentário',
//                'Docuficção',
//                'Drama',
//                'Espionagem',
//                'Faroeste',
//                'Fantasia científica',
//                'Ficção científica',
//                'Filmes de guerra',
//                'Musical',
//                'Filme policial',
//                'Romance',
//                'Seriado',
//                'Suspense',
//                'Terror'
//            ];
//
//        for($x = 0; $x < count($arGenero); $x++){
//            DB::table('generos')->insert([
//                'titulo' => $arGenero[$x],
//            ]);
//        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        $arGenero = [
//            'Ação',
//            'Animação',
//            'Aventura',
//            'Cinema de arte',
//            'Chanchada',
//            'Comédia',
//            'Comédia romântica',
//            'Comédia dramática',
//            'Comédia de ação',
//            'Dança',
//            'Documentário',
//            'Docuficção',
//            'Drama',
//            'Espionagem',
//            'Faroeste',
//            'Fantasia científica',
//            'Ficção científica',
//            'Filmes de guerra',
//            'Musical',
//            'Filme policial',
//            'Romance',
//            'Seriado',
//            'Suspense',
//            'Terror'
//        ];
//
//        for($x = 0; $x < count($arGenero); $x++) {
//            $y = $arGenero[$x];
//            DB::delete('DELETE FROM generos WHERE titulo = ? ', [$y]);
//        }
    }
}
