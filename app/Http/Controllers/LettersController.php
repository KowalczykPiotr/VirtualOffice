<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LettersController extends Controller
{

    function index() {

        return view('letters');
    }

}
