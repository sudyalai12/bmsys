<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['country'];
    protected $appends = ['country_name'];

    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = strtolower($name);
    }

    public function getNameAttribute(string $value)
    {
        return ucwords($value);
    }

    public function setNicknameAttribute(string $nickname)
    {
        $this->attributes['nickname'] = strtolower($nickname);
    }

    public function getNicknameAttribute(string $value)
    {
        return strtoupper($value);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function generateReference(): string
    {
        $name = $this->getNicknameAttribute($this->nickname);
        $year = date('Y');
        $yearPlusOne = date('y') + 1;

        return sprintf(
            'NEPL/%s/Q-%s/%s-%s/%s',
            strtoupper(substr($name, 0, 4)),
            date('md'),
            $year,
            $yearPlusOne,
            date('His')
        );
    }
}
