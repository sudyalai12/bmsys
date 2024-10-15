<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['customer'];

    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = ucwords($name);
    }
    public function setEmailAttribute(string $email)
    {
        $this->attributes['email'] = strtolower($email);
    }
    public function setDepartmentAttribute(string $department)
    {
        $this->attributes['department'] = ucwords($department);
    }

    public function setPhoneAttribute(string $phone)
    {
        $this->attributes['phone'] = strtoupper($phone);
    }

    public function setMobileAttribute(string $mobile)
    {
        $this->attributes['mobile'] = strtoupper($mobile);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
