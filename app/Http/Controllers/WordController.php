<?php

namespace App\Http\Controllers;

use App\Word;
use Dompdf\Options;
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
        $words = Word::all();
        $html = file_get_contents(__DIR__ . '/../../../resources/views/index.blade.php');
        $dompdf = new Dompdf();
        $pdfOptions = new Options();
        $pdfOptions->set('isPhpEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);
        $dompdf->loadHtml($html, compact('words'));
        $dompdf->setBasePath('/../');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
}
}
