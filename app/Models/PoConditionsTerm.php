<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoConditionsTerm extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'po_conditions_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $po_conditions_terms = [
        ['description' => "NC/NR (Non-Cancellable / Non-Returnable)"],
    ];
}
