<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PnfChargesTerm extends Model
{
    use HasFactory;
    protected $table = 'pnf_charges_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $pnf_charges_terms = [
        ['description' => 'Applicable @2.00% of the Order Value.'],
        ['description' => 'Applicable NA of the Order Value'],
    ];
}
