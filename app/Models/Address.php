<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['customer', 'country'];

    public function setAddress1Attribute(string $address1)
    {
        $this->attributes['address1'] = strtolower($address1);
    }
    public function getAddress1Attribute(string $value)
    {
        return ucwords($value);
    }

    public function setAddress2Attribute(string $address2)
    {
        $this->attributes['address2'] = strtolower($address2);
    }
    public function getAddress2Attribute(string $value)
    {
        return ucwords($value);
    }

    public function setCityAttribute(string $city)
    {
        $this->attributes['city'] = strtolower($city);
    }
    public function getCityAttribute(string $value)
    {
        return ucwords($value);
    }

    public function setStateAttribute(string $state)
    {
        $this->attributes['state'] = strtolower($state);
    }
    public function getStateAttribute(string $value)
    {
        return ucwords($value);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }
}
