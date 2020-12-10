<?php

namespace App\Http\Controllers;

class VueController extends Controller
{
    public function __invoke()
    {
        return view('spa');
    }
}
