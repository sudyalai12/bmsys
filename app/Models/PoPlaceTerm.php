<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoPlaceTerm extends Model
{
    use HasFactory;
    protected $table = 'po_place_terms';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $po_place_terms = [
        ['description' => "The Purchase Order and Payment should be in favour:<br>
                           NEUVIN ELECTRONICS PRIVATE LIMITED<br>
                           WZ-1258, Third Floor, Nand Gyan Bhawan<br>
                           Ashram Lane, Palam Village, New Delhi - 110045<br>
                           Phone/Fax: +91 11-25081947, +91 9910 584 666<br>
                           E-mail: info@neuvin.com, URL: www.neuvin.com<br>"],
    ];
}
