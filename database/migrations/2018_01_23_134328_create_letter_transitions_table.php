<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('letter_transitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('letter_id')->integer()->unsigned();
            $table->integer('letter_position_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('letter_id')->references('id')->on('letters');
            $table->foreign('letter_position_id')->references('id')->on('letter_positions');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_transitions');
    }
}
