<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['address', 'department', 'tax'];

    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = strtolower($name);
    }
    public function getNameAttribute(string $value)
    {
        return ucwords($value);
    }

    public function setEmailAttribute(string $email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    public function getEmailAttribute(string $value)
    {
        return strtolower($value);
    }

    public function setGstnAttribute(string $gstn)
    {
        $this->attributes['gstn'] = strtolower($gstn);
    }

    public function getGstnAttribute(string $value)
    {
        return strtoupper($value);
    }

    public function setPanAttribute(string $pan)
    {
        $this->attributes['pan'] = strtolower($pan);
    }

    public function getPanAttribute(string $value)
    {
        return strtoupper($value);
    }

    public function setStateCodeAttribute(string $stateCode)
    {
        $this->attributes['state_code'] = strtolower($stateCode);
    }

    public function getStateCodeAttribute(string $value)
    {
        return strtoupper($value);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
