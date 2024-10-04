<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\DeliveryTerm;
use App\Models\Enquiry;
use App\Models\FreightChargesTerm;
use App\Models\GstTerm;
use App\Models\HandlingChargesTerm;
use App\Models\PaymentTerm;
use App\Models\PnfChargesTerm;
use App\Models\PoConditionsTerm;
use App\Models\PoConditionTerm;
use App\Models\PoPlaceTerm;
use App\Models\PriceBasicTerm;
use App\Models\Product;
use App\Models\Quote;
use App\Models\QuoteItem;
use App\Models\SpecialConditionsTerm;
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
        $contact = Contact::where('name', $request->contact)
            ->whereHas('customer', function ($query) use ($request) {
                $query->where('name', $request->customer);
            })
            ->first();

        if (!$contact) {
            return back()->withErrors(['contact' => 'Contact not found.']);
        }

        $product = Product::where('part_number', $request->part_number)
            ->whereHas('supplier', function ($query) use ($request) {
                $query->where('name', $request->supplier);
            })
            ->first();

        if (!$product) {
            return back()->withErrors(['part_number' => 'Product not found.']);
        }

        $enquiry = Enquiry::create([
            'contact_id' => $contact->id,
            'reference' => $request->enquiry_reference,
            'date' => $request->enquiry_date,
            'due_date' => $request->due_date
        ]);

        $quote = Quote::create([
            'enquiry_id' => $enquiry->id,
            'reference' => $enquiry->contact->customer->generateReference(),

            // Customer Information
            'customer_name' => $enquiry->contact->customer->name,
            'nickname' => $enquiry->contact->customer->nickname,
            'tax_id' => $enquiry->contact->customer->tax_id,
            'gstn' => $enquiry->contact->customer->gstn,
            'pan' => $enquiry->contact->customer->pan,
            'state_code' => $enquiry->contact->customer->state_code,
            'address1' => $enquiry->contact->customer->address->address1,
            'address2' => $enquiry->contact->customer->address->address2,
            'city' => $enquiry->contact->customer->address->city,
            'pincode' => $enquiry->contact->customer->address->pincode,
            'state_id' => $enquiry->contact->customer->address->state_id,
            'country_id' => $enquiry->contact->customer->address->country_id,
            'contact_name' => $enquiry->contact->name,
            'email' => $enquiry->contact->email,
            'department' => $enquiry->contact->department,
            'mobile' => $enquiry->contact->mobile,
            'phone' => $enquiry->contact->phone,
        ]);

        $quote->quoteItems()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,

            // Product Information
            'name' => $product->supplier->name,
            'fullname' => $product->supplier->fullname,
            'country_id' => $product->supplier->country_id,
            'part_number' => $product->part_number,
            'description' => $product->description,
            'unit_price' => $product->unit_price,
            'purchase_price' => $product->purchase_price,
            'sale_price' => $product->sale_price,
            'hsn_code' => $product->hsn_code,
        ]);

        return redirect("/quotes/{$quote->id}");
    }

    public function show(Quote $quote)
    {
        $priceBasicTerms = PriceBasicTerm::get()->pluck('description');
        $paymentTerms = PaymentTerm::get()->pluck('description');
        $handlingChargesTerms = HandlingChargesTerm::get()->pluck('description');
        $gstTerms = GstTerm::get()->pluck('description');
        $deliveryTerms = DeliveryTerm::get()->pluck('description');
        $pnfChargesTerms = PnfChargesTerm::get()->pluck('description');
        $freightChargesTerms = FreightChargesTerm::get()->pluck('description');
        $warrantyTerms = WarrantyTerm::get()->pluck('description');
        $validityQuoteTerms = ValidityQuoteTerm::get()->pluck('description');
        $poConditionsTerms = PoConditionsTerm::get()->pluck('description');
        $specialConditionsTerms = SpecialConditionsTerm::get()->pluck('description');

        // quote date set to today
        $quote->date = date('Y-m-d', strtotime(now()));
        $quote->save();
        return view('quotes.show', compact('quote', 'priceBasicTerms', 'paymentTerms', 'handlingChargesTerms', 'gstTerms', 'deliveryTerms', 'pnfChargesTerms', 'freightChargesTerms', 'warrantyTerms', 'validityQuoteTerms', 'poConditionsTerms', 'specialConditionsTerms'));
    }

    public function edit() {}

    public function update(Quote $quote, Request $request)
    {
        if ($request->due_date) {
            $quote->date = $request->quote_date;
            $quote->enquiry->due_date = $request->due_date;
            $quote->enquiry->date = $request->enquiry_date;
            $quote->enquiry->reference = $request->enquiry_ref;
            $quote->enquiry->save();
            $quote->save();
            return response($request->all());
        }
        $priceBasicTerm = $request->price_basic_term;
        $paymentTerm = $request->payment_term;
        $handlingChargesTerm = $request->handling_charges_term;
        $gstTerm = $request->gst_term;
        $deliveryTerm = $request->delivery_term;
        $pnfChargesTerm = $request->pnf_charges_term;
        $freightChargesTerm = $request->freight_charges_term;
        $warrantyTerm = $request->warranty_term;
        $validityQuoteTerm = $request->validity_quote_term;
        $poConditionsTerm = $request->po_conditions_term;
        $specialConditionsTerm = $request->special_conditions_term;

        $quote->update([
            'price_basic_term' => $priceBasicTerm,
            'payment_term' => $paymentTerm,
            'handling_charges_term' => $handlingChargesTerm,
            'gst_term' => $gstTerm,
            'delivery_term' => $deliveryTerm,
            'pnf_charges_term' => $pnfChargesTerm,
            'freight_charges_term' => $freightChargesTerm,
            'warranty_term' => $warrantyTerm,
            'validity_quote_term' => $validityQuoteTerm,
            'po_conditions_term' => $poConditionsTerm,
            'special_conditions_term' => $specialConditionsTerm
        ]);

        return response()->json([
            'price_basic_term' => $priceBasicTerm,
            'payment_term' => $paymentTerm,
            'handling_charges_term' => $handlingChargesTerm,
            'gst_term' => $gstTerm,
            'delivery_term' => $deliveryTerm,
            'pnf_charges_term' => $pnfChargesTerm,
            'freight_charges_term' => $freightChargesTerm,
            'warranty_term' => $warrantyTerm,
            'validity_quote_term' => $validityQuoteTerm,
            'po_conditions_term' => $poConditionsTerm,
            'special_conditions_term' => $specialConditionsTerm
        ]);
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
            [
                'quantity' => $quote->quoteItems()->where('product_id', $product->id)->value('quantity') + $request->quantity,
                'name' => $product->supplier->name,
                'fullname' => $product->supplier->fullname,
                'country_id' => $product->supplier->country_id,
                'part_number' => $product->part_number,
                'description' => $product->description,
                'unit_price' => $product->unit_price,
                'purchase_price' => $product->purchase_price,
                'sale_price' => $product->sale_price,
                'hsn_code' => $product->hsn_code,
            ]
        );
        return redirect("/quotes/{$quote->id}");
    }

    public function destroyItem(Quote $quote, QuoteItem $quoteItem)
    {
        $quoteItem->delete();
        return redirect("/quotes/{$quote->id}");
    }

    public function updateItem(Quote $quote, QuoteItem $quoteItem, Request $request)
    {
        return response($request->all());
    }
}
