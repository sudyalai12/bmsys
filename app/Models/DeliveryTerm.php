<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTerm extends Model
{
    use HasFactory;
    protected $table = 'delivery_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $delivery_terms = [
        ['description' => '4 - 6 Weeks, effective from date of receipt of formal Purchase Order /Payment/LC.'],
        ['description' => '6 - 8 Weeks, effective from date of receipt of formal Purchase Order /Payment/LC.'],
        ['description' => '8 - 10 Weeks, effective from date of receipt of formal Purchase Order /Payment/LC.'],
        ['description' => '10 - 14 Weeks, effective from date of receipt of formal Purchase Order /Payment/LC.'],
        ['description' => '14 - 18 Weeks, effective from date of receipt of formal Purchase Order /Payment/LC.'],
    ];
}
