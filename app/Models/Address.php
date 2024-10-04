<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['state', 'country'];

    public function setAddress1Attribute(string $address1)
    {
        $this->attributes['address1'] = ucwords($address1);
    }
    public function setAddress2Attribute(string $address2)
    {
        $this->attributes['address2'] = ucwords($address2);
    }
    public function setCityAttribute(string $city)
    {
        $this->attributes['city'] = ucwords($city);
    }
    public function setPincodeAttribute(string $pincode)
    {
        $this->attributes['pincode'] = strtoupper($pincode);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
