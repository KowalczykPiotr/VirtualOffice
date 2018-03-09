<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{

    public function letter_type()
    {

        return $this->belongsTo('App\Letter_type');
    }

    public function letter_position()
    {

        return $this->belongsTo('App\Letter_position');
    }

    public function customer()
    {

        return $this->belongsTo('App\Customer');
    }


}
