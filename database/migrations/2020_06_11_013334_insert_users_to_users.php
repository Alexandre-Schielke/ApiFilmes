<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertUsersToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $arGenero = [
            ['name'=> 'jay baruchel', 'perfil'=>'ator'],
            ['name'=> 'Kit Harington', 'perfil'=>'ator'],
            ['name'=> 'Chris Sanders', 'perfil'=>'diretor']
        ];

        for($x = 0; $x < count($arGenero); $x++){
            DB::table('users')->insert([
                'name' =>  $arGenero[$x]['name'],
                'perfil' =>  $arGenero[$x]['perfil']
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $arGenero = [
            ['name'=> 'Retrato de uma Jovem em Chamas', 'ano'=>'2019', 'classificacao' => 'L'],
            ['name'=> 'Parasita', 'ano'=>'2019', 'classificacao' => '10'],
            ['name'=> 'joias Brutas', 'ano'=>'2019', 'classificacao' => '18']
        ];
        for($x = 0; $x < count($arGenero); $x++) {
            $y = $arGenero[$x];
            DB::delete('DELETE FROM users WHERE name = ? ', [$y]['name']);
        }
    }
}
