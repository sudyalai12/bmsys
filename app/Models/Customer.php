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
 
    public function setNameAttribute(?string $name): void
    {
        $this->attributes['name'] = $name ? ucwords(strtolower($name)) : null;
    }

    public function setNicknameAttribute(?string $nickname): void
    {
        $this->attributes['nickname'] = $nickname ? strtoupper($nickname) : null;
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
        $name = preg_replace('/[^A-Za-z0-9]/', '', $this->name);
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
