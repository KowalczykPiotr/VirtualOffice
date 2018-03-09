<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'customer_group_id'
    ];

    public function customer_group()
    {

        return $this->belongsTo('App\Customer_group');
    }
}
