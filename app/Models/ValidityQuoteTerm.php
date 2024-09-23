<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidityQuoteTerm extends Model
{
    use HasFactory;
    protected $table = 'validity_quote_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $validity_quote_terms = [
        ['description' => 'Prices are vaild for 30 days from the date of quote submission.'],
        ['description' => 'Prices are vaild for 45 days from the date of quote submission.'],
        ['description' => 'Prices are vaild for 60 days from the date of quote submission.'],
        ['description' => 'Prices are vaild for 90 days from the date of quote submission.'],
        ['description' => 'Prices are vaild for 120 days from the date of quote submission.'],
        ['description' => 'Prices are vaild for 180 days from the date of quote submission.'],
    ];
}
