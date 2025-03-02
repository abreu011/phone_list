<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    // Create new contact
    protected $fillable = [
        'name', 
        'last_name', 
        'phone_number'
    ];
    
    public function addresses(): HasMany

    {

        return $this->hasMany(Address::class);

    }
}