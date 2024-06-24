<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusixmatchController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $lyrics = $request->input('lyrics');
        return view('results', compact('lyrics'));
    }
}









