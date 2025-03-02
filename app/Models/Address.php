<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $fillable = [
        'city',
        'state',
        'zip_code',
        'neighborhood',
        'street',
        'number',
        'complement'
    ];

    public function contact(): BelongsTo
    {

        return $this->belongsTo(Contact::class);

    }
}
