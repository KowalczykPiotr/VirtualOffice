<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('letter_type_id')->unsigned();
            $table->integer('customer_id')->unsigned();
			$table->integer('letter_position_id')->unsigned(); 
            $table->timestamps();

            $table->foreign('letter_type_id')->references('id')->on('letter_types');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('letter_position_id')->references('id')->on('letter_positions'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letters');
    }
}
