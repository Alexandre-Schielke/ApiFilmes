<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertRelToRelFilmeUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $arUser = ['1','2','3'];
        for($x = 0; $x < count($arUser); $x++){
            DB::table('rel_filme_user')->insert([
                'user_id'=> $arUser[$x] ,
                'filme_id'=>'1',
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
        Schema::table('rel_filme_user', function (Blueprint $table) {
            //
        });
    }
}
