<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\DeliveryTerm;
use App\Models\FreightChargesTerm;
use App\Models\GstTerm;
use App\Models\HandlingChargesTerm;
use App\Models\PaymentTerm;
use App\Models\PnfChargesTerm;
use App\Models\PoPlaceTerm;
use App\Models\PriceBasicTerm;
use App\Models\Product;
use App\Models\Quote;
use App\Models\QuoteItem;
use App\Models\ValidityQuoteTerm;
use App\Models\WarrantyTerm;
use Illuminate\Http\Request;

class QuoteController extends Controller
{

    public function index()
    {
        $quotes = Quote::orderBy('updated_at', 'desc')->get();
        return view('quotes.index', compact('quotes'));
    }

    public function create(Request $request)
    {
        $contact = Contact::find($request->contact);
        return view('quotes.create', compact('contact'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'customer' => 'required|exists:customers,name',
            'contact' => 'required|exists:contacts,name',
            'part_number' => 'required|exists:products,part_number',
            'quantity' => 'required|numeric|min:1|max:100',
        ]);

        $contact = Contact::where('name', $validate['contact'])
            ->whereHas('customer', function ($query) use ($validate) {
                $query->where('name', $validate['customer']);
            })
            ->first();
        if (!$contact) {
            return back()->withErrors(['contact' => 'The selected contact is not associated with the selected customer.']);
        }

        $product = Product::where('part_number', $validate['part_number'])->first();
        $quote = Quote::create([
            'contact_id' => $contact->id,
        ]);
        $quote->reference = $quote->generateReference();
        $quote->quoteItems()->create([
            'product_id' => $product->id,
            'quantity' => $validate['quantity'],
        ]);
        return redirect("/quotes/{$quote->id}");
    }

    public function show(Quote $quote)
    {
        $priceBasicTerms = PriceBasicTerm::get()->pluck('description');
        $paymentTerms = PaymentTerm::get()->pluck('description');
        $handlingChargesTerms = HandlingChargesTerm::get()->pluck('description');
        // $poPlaceTerms = PoPlaceTerm::get()->pluck('description');
        $gstTerms = GstTerm::get()->pluck('description');
        $deliveryTerms = DeliveryTerm::get()->pluck('description');
        $pnfChargesTerms = PnfChargesTerm::get()->pluck('description');
        $freightChargesTerms = FreightChargesTerm::get()->pluck('description');
        $warrantyTerms = WarrantyTerm::get()->pluck('description');
        $validityQuoteTerms = ValidityQuoteTerm::get()->pluck('description');
        return view('quotes.show', compact('quote', 'priceBasicTerms', 'paymentTerms', 'handlingChargesTerms', 'gstTerms', 'deliveryTerms', 'pnfChargesTerms', 'freightChargesTerms', 'warrantyTerms', 'validityQuoteTerms'));
    }

    public function edit() {}

    public function update(Quote $quote, Request $request)
    {
        $priceBasicTerm = $request->price_basic_term;
        $paymentTerm = $request->payment_term;
        $handlingChargesTerm = $request->handling_charges_term;
        $gstTerm = $request->gst_term;
        $deliveryTerm = $request->delivery_term;
        $pnfChargesTerm = $request->pnf_charges_term;
        $freightChargesTerm = $request->freight_charges_term;
        $warrantyTerm = $request->warranty_term;
        $validityQuoteTerm = $request->validity_quote_term;

        if($request->due_date || $request->enquiry_date) {
            $dueDate = date('Y-m-d', strtotime($request->due_date));
            $enquiryDate = date('Y-m-d', strtotime($request->enquiry_date));
            $quote->update([
                'due_date' => $dueDate,
                'enquiry_date' => $enquiryDate
            ]);
            return response()->json(['due_date' => $dueDate, 'enquiry_date' => $enquiryDate]);
        }

        $priceBasicTerm = PriceBasicTerm::where('description', $priceBasicTerm)->first();
        $paymentTerm = PaymentTerm::where('description', $paymentTerm)->first();
        $handlingChargesTerm = HandlingChargesTerm::where('description', $handlingChargesTerm)->first();
        $gstTerm = GstTerm::where('description', $gstTerm)->first();
        $deliveryTerm = DeliveryTerm::where('description', $deliveryTerm)->first();
        $pnfChargesTerm = PnfChargesTerm::where('description', $pnfChargesTerm)->first();
        $freightChargesTerm = FreightChargesTerm::where('description', $freightChargesTerm)->first();
        $warrantyTerm = WarrantyTerm::where('description', $warrantyTerm)->first();
        $validityQuoteTerm = ValidityQuoteTerm::where('description', $validityQuoteTerm)->first();

        $quote->priceBasicTerm()->associate($priceBasicTerm);
        $quote->paymentTerm()->associate($paymentTerm);
        $quote->handlingChargesTerm()->associate($handlingChargesTerm);
        $quote->gstTerm()->associate($gstTerm);
        $quote->deliveryTerm()->associate($deliveryTerm);
        $quote->pnfChargesTerm()->associate($pnfChargesTerm);
        $quote->freightChargesTerm()->associate($freightChargesTerm);
        $quote->warrantyTerm()->associate($warrantyTerm);
        $quote->validityQuoteTerm()->associate($validityQuoteTerm);
        $quote->save();
        return response()->json($request->all());
    }

    public function destroy() {}

    public function storeItem(Request $request, Quote $quote)
    {
        $validate = $request->validate([
            'part_number' => 'required|exists:products,part_number',
            'quantity' => 'required|numeric|min:1|max:100',
        ]);

        $product = Product::where('part_number', $validate['part_number'])->first();
        $quoteItem = $quote->quoteItems()->updateOrCreate(
            ['product_id' => $product->id],
            ['quantity' => $quote->quoteItems()->where('product_id', $product->id)->value('quantity') + $request->quantity]
        );
        return redirect("/quotes/{$quote->id}");
    }

    public function destroyItem(Quote $quote, QuoteItem $quoteItem)
    {
        $quoteItem->delete();
        return redirect("/quotes/{$quote->id}");
    }
}
