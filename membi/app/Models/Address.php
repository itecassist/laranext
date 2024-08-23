<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'addressable_type',
        'addressable_id',
        'category',
        'label',
        'house_number',
        'building',
        'street',
        'district',
        'city',
        'state',
        'country_name',
        'country_code',
        'postal_code',
        'latitude',
        'longitude',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}
