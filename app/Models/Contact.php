<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Criar novo contato
    protected $fillable = [
        'name', 
        'lastName', 
        'phoneNumber'
    ];
    
}