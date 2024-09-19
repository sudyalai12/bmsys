<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function quotePdf(Quote $quote): \Illuminate\Http\Response
    {
        $customPaper = array(0, 0, 792, 612);
        $quote->generateReference();
        $file = "Q-" . date('mdY') . "-NEPL-" . $quote->contact->customer->nickname . ".pdf";
        return Pdf::loadView('pdf.quote', compact('quote'))->setPaper($customPaper, 'landscape')->stream($file);
    }
}
