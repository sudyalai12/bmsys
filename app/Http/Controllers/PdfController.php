<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function quotePdf(Quote $quote): \Illuminate\Http\Response
    {
        $id = $quote->id < 10 ? '00' . $quote->id : ($quote->id < 100 ? '0' . $quote->id : $quote->id);
        $customPaper = array(0, 0, 792, 612);
        $quote->generateReference();
        $file = "Q-" . date('md-'). $id . "-NEPL-" . $quote->contact->customer->nickname . ".pdf";
        return Pdf::loadView('pdf.quote', compact('quote'))->setPaper($customPaper, 'landscape')->stream($file);
    }

    public function create(Quote $quote)
    {
        $quote->generateReference();
        return view('pdf.quote', compact('quote'));
    }
}
