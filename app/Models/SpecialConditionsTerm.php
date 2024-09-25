<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialConditionsTerm extends Model
{
    use HasFactory;
    protected $table = 'special_conditions_terms';
    protected $guarded = [];
    protected $with = [];

    public static $validity_quote_terms = [
        ['description' => 'End Use Statement Required with Order.'],
        ['description' => 'NA'],
    ];
}
