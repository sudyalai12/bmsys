<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table = 'enquiries';
    protected $guarded = [];
    protected $hidden = [];
    protected $with = ['contact'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
