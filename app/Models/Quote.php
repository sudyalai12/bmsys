<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $table = 'quotes';
    protected $guarded = [];
    protected $with = ['enquiry'];
    protected $hidden = [];

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function quoteItems()
    {
        return $this->hasMany(QuoteItem::class);
    }
    public function total()
    {
        return $this->quoteItems->sum->total();
    }
    public function totalFixed()
    {
        return $this->quoteItems->sum->totalFixed();
    }
    public function taxAmount($tax = 0.18)
    {
        return $this->total() * $tax;
    }
    public function taxAmountFixed($tax = 0.18)
    {
        return $this->totalFixed() * $tax;
    }

    public function generateReference()
    {
        $this->reference = $this->enquiry->contact->customer->generateReference();
        $this->saveQuietly();
    }
}
