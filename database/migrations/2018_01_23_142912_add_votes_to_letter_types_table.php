<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToLetterTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('letter_types')->insert([
                'name' => 'list zwykły'
            ]
        );

        DB::table('letter_types')->insert([
                'name' => 'list polecony'
            ]
        );

        DB::table('letter_types')->insert([
                'name' => 'list paczka'
            ]
        );






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
