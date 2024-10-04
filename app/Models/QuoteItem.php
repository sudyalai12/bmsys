<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    use HasFactory;
    protected $table = 'quote_items';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = ['quote', 'product'];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function total()
    {
        return $this->quantity * $this->product->sale_price;
    }

    public function totalFixed()
    {
        return $this->quantity * $this->sale_price;
    }

    public function taxAmount($tax = 0.18)
    {
        return $this->total() * $tax;
    }

    public function taxAmountFixed($tax = 0.18)
    {
        return $this->totalFixed() * $tax;
    }
}
