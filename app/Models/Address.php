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

    public function setAddress1Attribute(?string $address1): void
    {
        $this->attributes['address1'] = $address1 ? ucwords(strtolower($address1)) : null;
    }

    public function setAddress2Attribute(?string $address2): void
    {
        $this->attributes['address2'] = $address2 ? ucwords(strtolower($address2)) : null;
    }

    public function setCityAttribute(?string $city): void
    {
        $this->attributes['city'] = $city ? ucwords(strtolower($city)) : null;
    }

    public function setStateAttribute(?string $state): void
    {
        $this->attributes['state'] = $state ? ucwords(strtolower($state)) : null;
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
