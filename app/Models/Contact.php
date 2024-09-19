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
    protected $with = ['customer', 'address'];

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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
