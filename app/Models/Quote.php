<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $table = 'quotes';
    protected $guarded = [];
    protected $with = ['contact'];
    protected $hidden = [];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    public function quoteItems()
    {
        return $this->hasMany(QuoteItem::class);
    }
    public function generateReference()
    {
        $this->reference = $this->contact->customer->generateReference();
        $this->save();
    }
    public function total()
    {
        return $this->quoteItems->sum->total();
    }
    public function tax($tax = 0.18)
    {
        return $this->total() * $tax;
    }

    public function priceBasicTerm()
    {
        return $this->belongsTo(PriceBasicTerm::class);
    }

    public function paymentTerm()
    {
        return $this->belongsTo(PaymentTerm::class);
    }

    public function handlingChargesTerm()
    {
        return $this->belongsTo(HandlingChargesTerm::class);
    }

    public function gstTerm()
    {
        return $this->belongsTo(GstTerm::class);
    }

    public function deliveryTerm()
    {
        return $this->belongsTo(DeliveryTerm::class);
    }

    public function pnfChargesTerm()
    {
        return $this->belongsTo(PnfChargesTerm::class);
    }

    public function freightChargesTerm()
    {
        return $this->belongsTo(FreightChargesTerm::class);
    }

    public function warrantyTerm()
    {
        return $this->belongsTo(WarrantyTerm::class);
    }

    public function validityQuoteTerm()
    {
        return $this->belongsTo(ValidityQuoteTerm::class);
    }

}
