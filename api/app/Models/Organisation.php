<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisation extends Model
{
    use HasFactory;
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

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name',
        'seo_name',
        'email',
        'phone',
    ];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
