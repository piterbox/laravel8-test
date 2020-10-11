<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * return view
     */
    public function index()
    {
        return view('welcome');
    }
}
