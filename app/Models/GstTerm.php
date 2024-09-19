<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GstTerm extends Model
{
    use HasFactory;
    protected $table = 'gst_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $gst_terms = [
        ['description' => 'Extra 5% on Electrical/Electronics/Quoted Products.'],
        ['description' => 'Extra 12% on Electrical/Electronics/Quoted Products.'],
        ['description' => 'Extra 18% on Electrical/Electronics/Quoted Products.'],
        ['description' => 'Extra 28% on Electrical/Electronics/Quoted Products.'],
    ];
}
