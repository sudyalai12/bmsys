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

    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = ucwords($name);
    }
    public function setFullNameAttribute(string $fullName)
    {
        $this->attributes['fullname'] = ucwords($fullName);
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
