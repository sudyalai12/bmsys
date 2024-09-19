<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyTerm extends Model
{
    use HasFactory;
    protected $table = 'warranty_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $warranty_terms = [
        ['description' => 'As per OEM policy, 12 months warranty against any manufacturing defect.'],
    ];
}
