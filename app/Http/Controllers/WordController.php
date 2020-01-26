<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Dompdf\Dompdf;


class WordController extends Controller
{
    public function index(){

        $words = Word::all();
        return view('index', compact('words'));
    }
    public function goto(){
        return redirect('/');
    }
    public function makepdf(){
        $html = file_get_contents(__DIR__ . '/../../../resources/views/index.blade.php');
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setBasePath('/../');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
}
}
