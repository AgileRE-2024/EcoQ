<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Mocking Data


        return view('welcome', compact('posts'));
    }
}
