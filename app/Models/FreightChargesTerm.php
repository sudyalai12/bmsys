<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreightChargesTerm extends Model
{
    use HasFactory;
    protected $table = 'freight_charges_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $freight_charges_terms = [
        ['description' => 'To be collect by the buyer/@2.00% of the order value.'],
        ['description' => 'To be collect by the buyer/ NA of the order value.'],
    ];
}
