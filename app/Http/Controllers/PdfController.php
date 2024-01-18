<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $data = ['some' => 'data']; // Replace with your data

        return view('pdf.view');
        $pdf = PDF::loadView('pdf.view', $data);

        // $pdfPath = 'public/pdf/' . uniqid() . '.pdf';

        // Storage::put($pdfPath, $pdf->output());

        return $pdf->stream('document.pdf');
    }
}
