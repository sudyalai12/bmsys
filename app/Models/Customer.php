<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['tax', 'address'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($name);
    }
    public function setNicknameAttribute($nickname)
    {
        $this->attributes['nickname'] = strtoupper($nickname);
    }
    public function setGstnAttribute($gstn)
    {
        $this->attributes['gstn'] = strtoupper($gstn);
    }
    public function setPanAttribute($pan)
    {
        $this->attributes['pan'] = strtoupper($pan);
    }
    public function setStateCodeAttribute($state_code)
    {
        $this->attributes['state_code'] = strtoupper($state_code);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function generateReference()
    {
        $name = $this->nickname;
        $year = date('Y');
        $yearPlusOne = date('y') + 1;

        return sprintf(
            'NEPL/%s/Q-%s/%s-%s',
            strtoupper($name),
            date('md'),
            $year,
            $yearPlusOne,
        );
    }
}
