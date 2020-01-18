<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(){
        $words = Word::all();
        return view('index', compact('words'));
    }
}
