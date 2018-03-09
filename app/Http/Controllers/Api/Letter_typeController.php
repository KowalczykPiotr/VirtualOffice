<?php

namespace App\Http\Controllers\Api;

use App\Letter_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Letter_typeController extends Controller
{

    function index()
    {

        $letter_types = Letter_type::take(99)
            ->orderBy('sort_order', 'asc')
            ->get();
        return $letter_types;
    }

}
