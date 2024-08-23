<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'creator_id',
        'name',
        'seo_name',
        'email',
        'phone',
        'logo',
        'website',
        'description',
        'free_trail',
        'free_trail_end_date',
        'is_public',
        'is_active'
    ];

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
