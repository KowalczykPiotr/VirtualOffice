<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter_transition extends Model
{
    //

    public function letter_position()
    {

        return $this->belongsTo('App\Letter_position');
    }

    public function user()
    {

        return $this->belongsTo('App\User');
    }

}
