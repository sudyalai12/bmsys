<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['country'];

    public function setNameAttribute(string $value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    public function getNameAttribute(string $value)
    {
        return ucwords($value);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
