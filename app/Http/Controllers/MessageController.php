<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('first-page');
    }

    public function secondPageShow()
    {
        return view('second-page');

    }
}
