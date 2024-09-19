<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandlingChargesTerm extends Model
{
    use HasFactory;
    protected $table = 'handling_charges_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $handling_charges_terms = [
        ['description' => 'INR 1500 per shipment.'],
        ['description' => '--- INR per shipment.'],
    ];
}
