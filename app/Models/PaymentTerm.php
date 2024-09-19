<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    use HasFactory;
    protected $table = 'payment_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $payment_terms = [
        ['description' => '100% Payment in Advance against Proforma Invoice.'],
        ['description' => '100% Payment through TT against Delivery within NET 30 Days.'],
    ];
}
