<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceBasicTerm extends Model
{
    use HasFactory;
    protected $table = 'price_basic_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $price_basic_terms = [
        ['description' => "EX WORKS NEUVIN ELECTRONICS PVT. LTD. NEW DELHI - 110045"],
    ];
}
