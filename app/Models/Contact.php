<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Create new contact
    protected $fillable = [
        'name', 
        'lastName', 
        'phoneNumber'
    ];
    
}