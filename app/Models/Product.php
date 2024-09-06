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

    public function setNameAttribute(string $value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    public function getNameAttribute(string $value)
    {
        return ucwords($value);
    }

    public function setDescriptionAttribute(string $value)
    {
        $this->attributes['description'] = strtolower($value);
    }
    public function getDescriptionAttribute(string $value)
    {
        return ucwords($value);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
