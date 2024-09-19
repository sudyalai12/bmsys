<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['supplier'];

    public function setDescriptionAttribute(string $description)
    {
        $this->attributes['description'] = ucwords($description);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
