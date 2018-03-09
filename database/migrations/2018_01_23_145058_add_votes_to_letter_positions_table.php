<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToLetterPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('letter_positions')->insert([
                'position' => 'do odbioru'
            ]
        );

        DB::table('letter_positions')->insert([
                'position' => 'wydana'
            ]
        );

        DB::table('letter_positions')->insert([
                'position' => 'zwrócona'
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
