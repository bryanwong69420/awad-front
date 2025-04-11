<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showSamsung()
    {
        return view('samsung'); 
    }

    public function showLG()
    {
        return view('lg');
    }
}
